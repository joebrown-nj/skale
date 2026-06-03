<?php
declare(strict_types=1);

namespace App\Models\Entities;

use Doctrine\DBAL\Schema\DefaultExpression\CurrentTimestamp;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'contact')]
class ContactEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    public string $name;

    #[ORM\Column(type: 'string', length: 100)]
    public string $email;

    #[ORM\Column(type: 'string', length: 20)]
    public string $phone;

    #[ORM\Column(type: 'text')]
    public string $message;

    #[ORM\Column(type: 'string', length: 100)]
    public string $interestedIn;

    #[ORM\Column(
        type: 'datetime',
        insertable: false,
        updatable: false,
        generated: 'INSERT',
        options: ['default' => new CurrentTimestamp()]
    )]
    public ?\DateTimeInterface $date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getInterestedIn(): string
    {
        return $this->interestedIn;
    }

    public function setInterestedIn(string $interestedIn): self
    {
        $this->interestedIn = $interestedIn;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
