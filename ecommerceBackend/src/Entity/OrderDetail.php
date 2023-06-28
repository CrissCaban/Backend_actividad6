<?php

namespace App\Entity;

use App\Repository\OrderDetailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderDetailRepository::class)]
class OrderDetail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?product $productId = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?order $orderId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductId(): ?product
    {
        return $this->productId;
    }

    public function setProductId(?product $productId): static
    {
        $this->productId = $productId;

        return $this;
    }

    public function getOrderId(): ?order
    {
        return $this->orderId;
    }

    public function setOrderId(?order $orderId): static
    {
        $this->orderId = $orderId;

        return $this;
    }
}
