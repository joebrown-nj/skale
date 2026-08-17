<?php

declare(strict_types=1);

namespace App\Models\Entities;

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

    public function __construct()
    {
        $this->menus = new \Doctrine\Common\Collections\ArrayCollection();
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

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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

    public function getDateUpdated(): string
    {
        return $this->dateUpdated;
    }

    public function setDateUpdated(string $dateUpdated): self
    {
        $this->dateUpdated = $dateUpdated;

        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection|MenuEntity[]
     */
    public function getMenus()
    {
        return $this->menus;
    }
}
