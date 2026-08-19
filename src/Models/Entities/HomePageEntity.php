<?php

declare(strict_types=1);

namespace App\Models\Entities;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getHeadline(): string
    {
        return $this->headline;
    }

    public function setHeadline(string $headline): self
    {
        $this->headline = $headline;

        return $this;
    }

    public function getSubHeading(): string
    {
        return $this->subHeading;
    }

    public function setSubHeading(string $subHeading): self
    {
        $this->subHeading = $subHeading;

        return $this;
    }

    public function getImpressions(): int
    {
        return $this->impressions;
    }

    public function setImpressions(int $impressions): self
    {
        $this->impressions = $impressions;

        return $this;
    }

    public function getButtonText(): string
    {
        return $this->buttonText;
    }

    public function setButtonText(string $buttonText): self
    {
        $this->buttonText = $buttonText;

        return $this;
    }

    public function getButtonUrl(): string
    {
        return $this->buttonUrl;
    }

    public function setButtonUrl(string $buttonUrl): self
    {
        $this->buttonUrl = $buttonUrl;

        return $this;
    }

    public function getSecondaryButtonText(): string
    {
        return $this->secondaryButtonText;
    }

    public function setSecondaryButtonText(string $secondaryButtonText): self
    {
        $this->secondaryButtonText = $secondaryButtonText;

        return $this;
    }

    public function getSecondaryButtonUrl(): string
    {
        return $this->secondaryButtonUrl;
    }

    public function setSecondaryButtonUrl(string $secondaryButtonUrl): self
    {
        $this->secondaryButtonUrl = $secondaryButtonUrl;

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
