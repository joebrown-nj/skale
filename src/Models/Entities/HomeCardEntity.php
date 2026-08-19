<?php

declare(strict_types=1);

namespace App\final Models\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'home_cards')]
class HomeCardEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    public string $title;

    #[ORM\Column(type: 'string', length: 100)]
    public string $subTitle;

    #[ORM\Column(type: 'string', length: 50)]
    public string $image;

    #[ORM\Column(type: 'string', length: 100)]
    public string $url;

    #[ORM\Column(type: 'string', length: 500)]
    public string $shortText;

    #[ORM\Column(type: 'text')]
    public string $content;
}
