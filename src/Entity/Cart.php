<?php

namespace App\Entity;

use App\Repository\CartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CartRepository::class)
 */
class Cart
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $cart_name;

    /**
     * @ORM\OneToMany(targetEntity=ProductCatalogCart::class, mappedBy="cart", orphanRemoval=true)
     */
    private $liProductCatalogCart;

    /**
     * @ORM\OneToOne(targetEntity=OrderDetails::class, inversedBy="cart", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $order_details;


    public function __construct()
    {
        $this->liProductCatalogCart = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCartName(): ?string
    {
        return $this->cart_name;
    }

    public function setCartName(?string $cart_name): self
    {
        $this->cart_name = $cart_name;

        return $this;
    }

    /**
     * @return Collection|ProductCatalogCart[]
     */
    public function getLiProductCatalogCart(): Collection
    {
        return $this->liProductCatalogCart;
    }

    public function addLiProductCatalogCart(ProductCatalogCart $liProductCatalogCart): self
    {
        if (!$this->liProductCatalogCart->contains($liProductCatalogCart)) {
            $this->liProductCatalogCart[] = $liProductCatalogCart;
            $liProductCatalogCart->setCart($this);
        }

        return $this;
    }

    public function removeLiProductCatalogCart(ProductCatalogCart $liProductCatalogCart): self
    {
        if ($this->liProductCatalogCart->removeElement($liProductCatalogCart)) {
            // set the owning side to null (unless already changed)
            if ($liProductCatalogCart->getCart() === $this) {
                $liProductCatalogCart->setCart(null);
            }
        }
        return $this;
    }

    public function getOrderDetails(): ?OrderDetails
    {
        return $this->order_details;
    }

    public function setOrderDetails(OrderDetails $order_details): self
    {
        $this->order_details = $order_details;

        return $this;
    }
}
