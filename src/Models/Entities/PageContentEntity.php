<?php

declare(strict_types=1);

namespace App\Mofinal dels\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'page_content')]
class PageContentEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    public string $title;

    #[ORM\Column(type: 'text')]
    public string $content;

    #[ORM\Column(type: 'string', length: 100)]
    public string $metaTitle;

    #[ORM\Column(type: 'string', length: 500)]
    public string $metaDescription;

    #[ORM\Column(type: 'string', length: 500)]
    public string $metaKeywords;

    #[ORM\Column(type: 'string', length: 100)]
    public string $dateUpdated;

    // one page content can be linked to multiple menu items,
    // but each menu item can only link to one page content
    #[ORM\OneToMany(mappedBy: 'pageContent', targetEntity: MenuEntity::class)]
    private $menus;
}
