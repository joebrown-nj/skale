<?php

declare(strict_types=1);

namespace App\Models\final Entities;

use Doctrine\DBAL\Schema\DefaultExpression\CurrentTimestamp;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'log_button_clicks')]
class LogButtonClicksEntity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    public ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    public string $target;

    #[ORM\Column(type: 'string', length: 100)]
    public string $url;

    #[ORM\Column(type: 'text')]
    public string $detail;

    #[ORM\Column(type: 'string', length: 50)]
    public string $userIP;

    #[ORM\Column(type: 'text')]
    public string $userInfo;

    #[ORM\Column(type: 'text')]
    public string $serverInfo;

    #[ORM\Column(
        type: 'datetime',
        insertable: false,
        updatable: false,
        generated: 'INSERT',
        options: ['default' => new CurrentTimestamp()],
    )]
    public ?\DateTimeInterface $date = null;

    public function setTarget(string $target): self
    {
        $this->target = $target;

        return $this;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function setUserIP(string $userIP): self
    {
        $this->userIP = $userIP;

        return $this;
    }

    public function setUserInfo(string $userInfo): self
    {
        $this->userInfo = $userInfo;

        return $this;
    }

    public function setServerInfo(string $serverInfo): self
    {
        $this->serverInfo = $serverInfo;

        return $this;
    }
}
