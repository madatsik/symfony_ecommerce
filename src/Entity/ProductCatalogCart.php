<?php

namespace App\Entity;

use App\Repository\ProductCatalogCartRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductCatalogCartRepository::class)
 */
class ProductCatalogCart
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $discount;

    /**
     * @ORM\ManyToOne(targetEntity=Cart::class, inversedBy="liProductCatalogCart")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cart;

    /**
     * @ORM\ManyToOne(targetEntity=ProductCatalog::class, inversedBy="liProductCatalogCart")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productCatalog;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    public function setDiscount(?int $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getCart(): ?Cart
    {
        return $this->cart;
    }

    public function setCart(?Cart $cart): self
    {
        $this->cart = $cart;

        return $this;
    }

    public function getProductCatalog(): ?ProductCatalog
    {
        return $this->productCatalog;
    }

    public function setProductCatalog(?ProductCatalog $productCatalog): self
    {
        $this->productCatalog = $productCatalog;

        return $this;
    }
}
