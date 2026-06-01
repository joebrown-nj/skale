<?php
declare(strict_types=1);

namespace App\Models\Entities;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'blog')]
class BlogEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    public string $title;

    #[ORM\Column(type: 'string', length: 100)]
    public string $url;

    #[ORM\Column(type: 'text')]
    public string $content;

    #[ORM\Column(type: 'text')]
    public string $shortText;

    #[ORM\Column(type: 'string', length: 100)]
    public string $image;

    #[ORM\Column(type: 'datetime')]
    public DateTime $datePosted;

    #[ORM\Column(type: 'boolean')]
    public bool $featured;

    #[ORM\Column(type: 'string', length: 100)]
    public string $metaTitle;

    #[ORM\Column(type: 'string', length: 100)]
    public string $metaDescription;

    #[ORM\Column(type: 'string', length: 100)]
    public string $metaKeywords;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    public ?string $category = null;

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

    public function getShortText(): string
    {
        return $this->shortText;
    }

    public function setShortText(string $shortText): self
    {
        $this->shortText = $shortText;

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

    public function getDatePosted(): DateTime
    {
        return $this->datePosted;
    }

    public function setDatePosted(DateTime $datePosted): self
    {
        $this->datePosted = $datePosted;

        return $this;
    }

    public function isFeatured(): bool
    {
        return $this->featured;
    }

    public function setFeatured(bool $featured): self
    {
        $this->featured = $featured;

        return $this;
    }

    public function getMetaTitle(): string
    {
        return $this->metaTitle;
    }

    public function setMetaTitle(string $metaTitle): self
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    public function getMetaDescription(): string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(string $metaDescription): self
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    public function getMetaKeywords(): string
    {
        return $this->metaKeywords;
    }

    public function setMetaKeywords(string $metaKeywords): self
    {
        $this->metaKeywords = $metaKeywords;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category;

        return $this;
    }
}
