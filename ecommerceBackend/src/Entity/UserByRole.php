<?php

namespace App\Entity;

use App\Repository\UserByRoleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserByRoleRepository::class)]
class UserByRole
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?usuario $userId = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?role $roleId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?usuario
    {
        return $this->userId;
    }

    public function setUserId(?usuario $userId): static
    {
        $this->userId = $userId;

        return $this;
    }

    public function getRoleId(): ?role
    {
        return $this->roleId;
    }

    public function setRoleId(?role $roleId): static
    {
        $this->roleId = $roleId;

        return $this;
    }
}
