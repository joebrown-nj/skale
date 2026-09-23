<?php

declare(strict_types=1);

namespace App\Models\Entities;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'testimonials')]
class TestimonialEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    public string $title;

    #[ORM\Column(type: 'text')]
    public string $text;

    #[ORM\Column(name: 'testimonialDate', type: 'date_immutable')]
    public DateTimeImmutable $date;

    #[ORM\Column(type: 'string', length: 150)]
    public string $author;

    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    public ?string $authorTitle = null;

    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    public ?string $company = null;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    public ?string $imageUrl = null;

    #[ORM\Column(type: 'smallint', nullable: true)]
    public ?int $rating = null;

    #[ORM\Column(type: 'boolean', options: array('default' => true))]
    public bool $active = true;

    /** @var Collection<int, PortfolioEntity> */
    #[ORM\ManyToMany(targetEntity: PortfolioEntity::class, inversedBy: 'testimonials')]
    #[ORM\JoinTable(name: 'testimonial_projects')]
    #[ORM\JoinColumn(name: 'testimonialId', referencedColumnName: 'id', onDelete: 'CASCADE')]
    #[ORM\InverseJoinColumn(name: 'projectId', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Collection $projects;

    /** @var Collection<int, self> */
    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'relatedFromTestimonials')]
    #[ORM\JoinTable(name: 'testimonial_relationships')]
    #[ORM\JoinColumn(name: 'testimonialId', referencedColumnName: 'id', onDelete: 'CASCADE')]
    #[ORM\InverseJoinColumn(name: 'relatedTestimonialId', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Collection $relatedTestimonials;

    /** @var Collection<int, self> */
    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'relatedTestimonials')]
    private Collection $relatedFromTestimonials;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
        $this->relatedTestimonials = new ArrayCollection();
        $this->relatedFromTestimonials = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    public function getText(): string
    {
        return $this->text;
    }
    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }
    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }
    public function setDate(DateTimeImmutable $date): self
    {
        $this->date = $date;
        return $this;
    }
    public function getAuthor(): string
    {
        return $this->author;
    }
    public function setAuthor(string $author): self
    {
        $this->author = $author;
        return $this;
    }
    public function getAuthorTitle(): ?string
    {
        return $this->authorTitle;
    }
    public function setAuthorTitle(?string $authorTitle): self
    {
        $this->authorTitle = $authorTitle;
        return $this;
    }
    public function getCompany(): ?string
    {
        return $this->company;
    }
    public function setCompany(?string $company): self
    {
        $this->company = $company;
        return $this;
    }
    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }
    public function setImageUrl(?string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }
    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): self
    {
        if (null !== $rating && ($rating < 1 || $rating > 5)) {
            throw new \InvalidArgumentException('Rating must be between 1 and 5.');
        }
        $this->rating = $rating;
        return $this;
    }

    public function isActive(): bool
    {
        return $this->active;
    }
    public function setActive(bool $active): self
    {
        $this->active = $active;
        return $this;
    }

    /** @return Collection<int, PortfolioEntity> */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(PortfolioEntity $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects->add($project);
            $project->addTestimonial($this);
        }
        return $this;
    }

    public function removeProject(PortfolioEntity $project): self
    {
        if ($this->projects->removeElement($project)) {
            $project->removeTestimonial($this);
        }
        return $this;
    }

    /** @return Collection<int, self> */
    public function getRelatedTestimonials(): Collection
    {
        return $this->relatedTestimonials;
    }

    /** @return Collection<int, self> */
    public function getRelatedFromTestimonials(): Collection
    {
        return $this->relatedFromTestimonials;
    }

    public function addRelatedTestimonial(self $testimonial): self
    {
        if ($testimonial !== $this && !$this->relatedTestimonials->contains($testimonial)) {
            $this->relatedTestimonials->add($testimonial);
        }
        return $this;
    }

    public function removeRelatedTestimonial(self $testimonial): self
    {
        $this->relatedTestimonials->removeElement($testimonial);
        return $this;
    }
}
