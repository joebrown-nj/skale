<?php

declare(strict_types=1);

namespace Apfinal p\Models\Entities;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'services')]
class ServicesEntity
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
}
