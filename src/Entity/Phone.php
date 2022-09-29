<?php

namespace App\Entity;

use App\Repository\PhoneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PhoneRepository::class)
 */
class Phone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $country_code;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $area_code;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $phone_number;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $extention;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $phone_type;

    /**
     * @ORM\Column(type="boolean")
     */
    private $primary_phone;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="liPhone")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountryCode(): ?string
    {
        return $this->country_code;
    }

    public function setCountryCode(string $country_code): self
    {
        $this->country_code = $country_code;

        return $this;
    }

    public function getAreaCode(): ?string
    {
        return $this->area_code;
    }

    public function setAreaCode(string $area_code): self
    {
        $this->area_code = $area_code;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getExtention(): ?string
    {
        return $this->extention;
    }

    public function setExtention(?string $extention): self
    {
        $this->extention = $extention;

        return $this;
    }

    public function getPhoneType(): ?string
    {
        return $this->phone_type;
    }

    public function setPhoneType(string $phone_type): self
    {
        $this->phone_type = $phone_type;

        return $this;
    }

    public function getPrimaryPhone(): ?bool
    {
        return $this->primary_phone;
    }

    public function setPrimaryPhone(bool $primary_phone): self
    {
        $this->primary_phone = $primary_phone;

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
