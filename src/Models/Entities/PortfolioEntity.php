<?php

declare(strict_types=1);

namespace Appfinal \Models\Entities;

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
}
