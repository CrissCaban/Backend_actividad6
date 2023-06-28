<?php

namespace App\Entity;

use App\Repository\ProductDetailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductDetailRepository::class)]
class ProductDetail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $size = null;

    #[ORM\Column(length: 10)]
    private ?string $color = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?product $productId = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?category $categoryId = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?productType $productTypeId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

        return $this;
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

    public function getCategoryId(): ?category
    {
        return $this->categoryId;
    }

    public function setCategoryId(?category $categoryId): static
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function getProductTypeId(): ?productType
    {
        return $this->productTypeId;
    }

    public function setProductTypeId(?productType $productTypeId): static
    {
        $this->productTypeId = $productTypeId;

        return $this;
    }
}
