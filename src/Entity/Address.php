<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AddressRepository::class)
 */
class Address
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=95)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $apt_suite;

    /**
     * @ORM\Column(type="string", length=35)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $state;

    /**
     * @ORM\Column(type="integer")
     */
    private $zip_code;

    /**
     * @ORM\Column(type="string", length=74)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $address_type;

    /**
     * @ORM\Column(type="boolean")
     */
    private $primary_address;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="liAddress")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getAptSuite(): ?string
    {
        return $this->apt_suite;
    }

    public function setAptSuite(?string $apt_suite): self
    {
        $this->apt_suite = $apt_suite;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getZipCode(): ?int
    {
        return $this->zip_code;
    }

    public function setZipCode(int $zip_code): self
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getAddressType(): ?string
    {
        return $this->address_type;
    }

    public function setAddressType(string $address_type): self
    {
        $this->address_type = $address_type;

        return $this;
    }

    public function getPrimaryAddress(): ?bool
    {
        return $this->primary_address;
    }

    public function setPrimaryAddress(bool $primary_address): self
    {
        $this->primary_address = $primary_address;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
