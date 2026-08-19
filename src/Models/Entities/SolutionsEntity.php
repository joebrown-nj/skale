<?php

declare(strict_types=1);

namespace App\Models\Entities;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'solutions')]
class SolutionsEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    public string $title;

    #[ORM\Column(type: 'string', length: 50)]
    public string $url;

    #[ORM\Column(type: 'string', length: 50)]
    public string $iconType;

    #[ORM\Column(type: 'string', length: 50)]
    public string $iconBootstrap;

    #[ORM\Column(type: 'string', length: 50)]
    public string $iconFontAwesome;

    #[ORM\Column(type: 'string', length: 50)]
    public string $largeIcon;

    #[ORM\Column(type: 'text')]
    public string $shortText;

    #[ORM\Column(type: 'text')]
    public string $content;

    #[ORM\Column(type: 'string', length: 50)]
    public string $image;

    #[ORM\Column(type: 'string', length: 50)]
    public string $headerImage;

    #[ORM\Column(type: 'string', length: 50)]
    public string $whyChooseList;

    #[ORM\Column(type: 'string', length: 50)]
    public string $footerCallout;

    #[ORM\Column(type: 'datetime')]
    public DateTime $dateAdded;

    #[ORM\Column(type: 'datetime')]
    public DateTime $dateUpdated;

    #[ORM\Column(type: 'integer')]
    public int $listingOrder;

    #[ORM\Column(type: 'boolean')]
    public bool $active;

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

    public function getIconType(): string
    {
        return $this->iconType;
    }

    public function setIconType(string $iconType): self
    {
        $this->iconType = $iconType;

        return $this;
    }

    public function getIconBootstrap(): string
    {
        return $this->iconBootstrap;
    }

    public function setIconBootstrap(string $iconBootstrap): self
    {
        $this->iconBootstrap = $iconBootstrap;

        return $this;
    }

    public function getIconFontAwesome(): string
    {
        return $this->iconFontAwesome;
    }

    public function setIconFontAwesome(string $iconFontAwesome): self
    {
        $this->iconFontAwesome = $iconFontAwesome;

        return $this;
    }

    public function getLargeIcon(): string
    {
        return $this->largeIcon;
    }

    public function setLargeIcon(string $largeIcon): self
    {
        $this->largeIcon = $largeIcon;

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

    public function getHeaderImage(): string
    {
        return $this->headerImage;
    }

    public function setHeaderImage(string $headerImage): self
    {
        $this->headerImage = $headerImage;

        return $this;
    }

    public function getWhyChooseList(): string
    {
        return $this->whyChooseList;
    }

    public function setWhyChooseList(string $whyChooseList): self
    {
        $this->whyChooseList = $whyChooseList;

        return $this;
    }

    public function getFooterCallout(): string
    {
        return $this->footerCallout;
    }

    public function setFooterCallout(string $footerCallout): self
    {
        $this->footerCallout = $footerCallout;

        return $this;
    }

    public function getDateAdded(): DateTime
    {
        return $this->dateAdded;
    }

    public function setDateAdded(DateTime $dateAdded): self
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    public function getDateUpdated(): DateTime
    {
        return $this->dateUpdated;
    }

    public function setDateUpdated(DateTime $dateUpdated): self
    {
        $this->dateUpdated = $dateUpdated;

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

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }
}
