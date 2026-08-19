<?php

declare(strict_types=1);

namespacfinal e App\Models\Entities;

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

    #[ORM\Column(type: 'string', length: 25)]
    public string $icon;

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

    public function getPageContent(): ?PageContentEntity
    {
        return $this->pageContent;
    }
}
