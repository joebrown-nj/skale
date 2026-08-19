<?php

declare(strict_types=1);

namespacfinal e App\Models\Entities;

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

    #[ORM\Column(type: 'string', length: 250)]
    public string $title;

    #[ORM\Column(type: 'string', length: 100)]
    public string $url;

    #[ORM\Column(type: 'text')]
    public string $content;

    #[ORM\Column(type: 'text')]
    public string $shortText;

    #[ORM\Column(type: 'string', length: 250)]
    public string $heroStyle;

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
}
