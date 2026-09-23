<?php

declare(strict_types=1);

namespace App\Models\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'portfolio')]
class PortfolioEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public ?int $id = null;

    #[ORM\Column(type: 'string', length: 100)]
    public string $title;

    #[ORM\Column(type: 'string', length: 150)]
    public string $url;

    #[ORM\Column(type: 'string', length: 500)]
    public string $content;

    #[ORM\Column(type: 'string', length: 100)]
    public string $image;

    /** @var Collection<int, TestimonialEntity> */
    #[ORM\ManyToMany(targetEntity: TestimonialEntity::class, mappedBy: 'projects')]
    private Collection $testimonials;

    public function __construct()
    {
        $this->testimonials = new ArrayCollection();
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

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /** @return Collection<int, TestimonialEntity> */
    public function getTestimonials(): Collection
    {
        return $this->testimonials;
    }

    public function addTestimonial(TestimonialEntity $testimonial): self
    {
        if (!$this->testimonials->contains($testimonial)) {
            $this->testimonials->add($testimonial);
        }

        return $this;
    }

    public function removeTestimonial(TestimonialEntity $testimonial): self
    {
        $this->testimonials->removeElement($testimonial);

        return $this;
    }
}
