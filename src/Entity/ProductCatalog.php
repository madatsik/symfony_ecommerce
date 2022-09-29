<?php

namespace App\Entity;

use App\Repository\ProductCatalogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductCatalogRepository::class)
 */
class ProductCatalog
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $product_name;

    /**
     * @ORM\Column(type="integer")
     */
    private $vendor_id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $manufacturer_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $color_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $size_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $unit_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price_per_unit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $weight_per_unit;

    /**
     * @ORM\OneToMany(targetEntity=ProductCatalogCart::class, mappedBy="productCatalog", orphanRemoval=true)
     */
    private $liProductCatalogCart;

    public function __construct()
    {
        $this->liProductCatalogCart = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): self
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function getVendorId(): ?int
    {
        return $this->vendor_id;
    }

    public function setVendorId(int $vendor_id): self
    {
        $this->vendor_id = $vendor_id;

        return $this;
    }

    public function getManufacturerId(): ?string
    {
        return $this->manufacturer_id;
    }

    public function setManufacturerId(string $manufacturer_id): self
    {
        $this->manufacturer_id = $manufacturer_id;

        return $this;
    }

    public function getColorId(): ?int
    {
        return $this->color_id;
    }

    public function setColorId(?int $color_id): self
    {
        $this->color_id = $color_id;

        return $this;
    }

    public function getSizeId(): ?int
    {
        return $this->size_id;
    }

    public function setSizeId(?int $size_id): self
    {
        $this->size_id = $size_id;

        return $this;
    }

    public function getUnitId(): ?int
    {
        return $this->unit_id;
    }

    public function setUnitId(?int $unit_id): self
    {
        $this->unit_id = $unit_id;

        return $this;
    }

    public function getPricePerUnit(): ?int
    {
        return $this->price_per_unit;
    }

    public function setPricePerUnit(?int $price_per_unit): self
    {
        $this->price_per_unit = $price_per_unit;

        return $this;
    }

    public function getWeightPerUnit(): ?int
    {
        return $this->weight_per_unit;
    }

    public function setWeightPerUnit(?int $weight_per_unit): self
    {
        $this->weight_per_unit = $weight_per_unit;

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
            $liProductCatalogCart->setProductCatalog($this);
        }

        return $this;
    }

    public function removeLiProductCatalogCart(ProductCatalogCart $liProductCatalogCart): self
    {
        if ($this->liProductCatalogCart->removeElement($liProductCatalogCart)) {
            // set the owning side to null (unless already changed)
            if ($liProductCatalogCart->getProductCatalog() === $this) {
                $liProductCatalogCart->setProductCatalog(null);
            }
        }

        return $this;
    }
}
