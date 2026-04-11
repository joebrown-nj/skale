<?php
declare(strict_types=1);

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'menu')]
class MenuEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    public string $title;

    #[ORM\Column(type: 'string', length: 60)]
    public string $url;

    #[ORM\Column(type: 'string', length: 60)]
    public string $class;

    #[ORM\Column(type: 'integer')]
    public int $pageContentId;

    #[ORM\Column(type: 'integer')]
    public int $parentId;

    #[ORM\Column(type: 'integer')]
    public int $listingOrder;

    #[ORM\Column(type: 'string', length: 20)]
    public string $menuLocation;

    #[ORM\Column(type: 'boolean')]
    public bool $active;

    #[ORM\ManyToOne(targetEntity: PageContentEntity::class)]
    #[ORM\JoinColumn(name: 'pageContentId', referencedColumnName: 'id')]
    private ?PageContentEntity $pageContent = null;

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

    public function getClass(): string
    {
        return $this->class;
    }

    public function setClass(string $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getPageContentId(): int
    {
        return $this->pageContentId;
    }

    public function setPageContentId(int $pageContentId): self
    {
        $this->pageContentId = $pageContentId;

        return $this;
    }

    public function getParentId(): int
    {
        return $this->parentId;
    }

    public function setParentId(int $parentId): self
    {
        $this->parentId = $parentId;

        return $this;
    }

    public function getListingOrder(): int
    {
        return $this->listingOrder;
    }

    public function setListingOrder(int $listingOrder): self
    {
        $this->listingOrder = $listingOrder;

        return $this;
    }

    public function getMenuLocation(): string
    {
        return $this->menuLocation;
    }

    public function setMenuLocation(string $menuLocation): self
    {
        $this->menuLocation = $menuLocation;

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

    public function getPageContent(): ?PageContentEntity
    {
        return $this->pageContent;
    }

    public function setPageContent(?PageContentEntity $pageContent): self
    {
        $this->pageContent = $pageContent;

        return $this;
    }
}
