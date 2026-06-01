<?php
declare(strict_types=1);

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'email_list_signups')]
class EmailListSignupsEntity
{
 #[ORM\Id]
 #[ORM\Column(type: 'integer')]
 #[ORM\GeneratedValue]
 public ?int $id = null;

 #[ORM\Column(type: 'string', length: 100)]
 public string $email;

 #[ORM\Column(type: 'string', length: 500)]
 public string $userInfo;

 public function getId(): ?int
 {
 return $this->id;
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

 public function getUserInfo(): string
 {
 return $this->userInfo;
 }

 public function setUserInfo(string $userInfo): self
 {
 $this->userInfo = $userInfo;

 return $this;
 }
}
