<?php
declare(strict_types=1);

namespace App\Models\Entities;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarget(): string
    {
        return $this->target;
    }

    public function setTarget(string $target): self
    {
        $this->target = $target;

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

    public function getDetail(): string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    public function getUserIP(): string
    {
        return $this->userIP;
    }

    public function setUserIP(string $userIP): self
    {
        $this->userIP = $userIP;

        return $this;
    }

    public function getUserInfo(): string
    {
        return $this->userInfo;
    }

    public function setUserInfo(string $userInfo): self
    {
        $this->userInfo = $userInfo;

        return $this;
    }

    public function getServerInfo(): string
    {
        return $this->serverInfo;
    }

    public function setServerInfo(string $serverInfo): self
    {
        $this->serverInfo = $serverInfo;

        return $this;
    }
}
