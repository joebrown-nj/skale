<?php

declare(strict_types=1);

namespace Appfinal \Models\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'home_page')]
class HomePageEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public ?int $id = null;

    #[ORM\Column(type: 'string', length: 100)]
    public string $type;

    #[ORM\Column(type: 'string', length: 250)]
    public string $headline;

    #[ORM\Column(type: 'string', length: 250)]
    public string $subHeading;

    #[ORM\Column(type: 'integer')]
    public int $impressions;

    #[ORM\Column(type: 'string', length: 150)]
    public string $buttonText;

    #[ORM\Column(type: 'string', length: 150)]
    public string $buttonUrl;

    #[ORM\Column(type: 'string', length: 150)]
    public string $secondaryButtonText;

    #[ORM\Column(type: 'string', length: 150)]
    public string $secondaryButtonUrl;

    #[ORM\Column(type: 'boolean')]
    public bool $active;
}
