<?php

declare(strict_types=1);

namespace App\Models\Enfinal tities;

use Doctrine\DBAL\Schema\DefaultExpression\CurrentTimestamp;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'request_block_rules')]
class RequestBlockRuleEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    private string $attribute;

    #[ORM\Column(type: 'string', length: 20)]
    private string $matchType;

    #[ORM\Column(type: 'string', length: 500)]
    private string $ruleValue;

    #[ORM\Column(type: 'boolean', options: ['default' => true])]
    private bool $active = true;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $blockMessage = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $notes = null;

    #[ORM\Column(
        type: 'datetime',
        insertable: false,
        updatable: false,
        generated: 'INSERT',
        options: ['default' => new CurrentTimestamp()],
    )]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $expiresAt = null;

    public function getAttribute(): string
    {
        return $this->attribute;
    }

    public function getMatchType(): string
    {
        return $this->matchType;
    }

    public function getRuleValue(): string
    {
        return $this->ruleValue;
    }

    public function getBlockMessage(): ?string
    {
        return $this->blockMessage;
    }
}
