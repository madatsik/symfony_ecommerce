<?php

namespace App\Entity;

use App\Repository\PaymentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaymentRepository::class)
 */
class Payment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $cc_number;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $cc_type;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $cc_name_different;

    /**
     * @ORM\Column(type="integer")
     */
    private $cc_exp_month;

    /**
     * @ORM\Column(type="integer")
     */
    private $cc_exp_year;

    /**
     * @ORM\Column(type="integer")
     */
    private $cc_sec_code;

    /**
     * @ORM\Column(type="boolean")
     */
    private $primary_payment;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="liPayment")
     */
    private $customer;

    /**
     * @ORM\OneToMany(targetEntity=OrderDetails::class, mappedBy="payment")
     */
    private $liOrderDetails;

    public function __construct()
    {
        $this->liOrderDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCcNumber(): ?string
    {
        return $this->cc_number;
    }

    public function setCcNumber(string $cc_number): self
    {
        $this->cc_number = $cc_number;

        return $this;
    }

    public function getCcType(): ?string
    {
        return $this->cc_type;
    }

    public function setCcType(string $cc_type): self
    {
        $this->cc_type = $cc_type;

        return $this;
    }

    public function getCcNameDifferent(): ?string
    {
        return $this->cc_name_different;
    }

    public function setCcNameDifferent(?string $cc_name_different): self
    {
        $this->cc_name_different = $cc_name_different;

        return $this;
    }

    public function getCcExpMonth(): ?int
    {
        return $this->cc_exp_month;
    }

    public function setCcExpMonth(int $cc_exp_month): self
    {
        $this->cc_exp_month = $cc_exp_month;

        return $this;
    }

    public function getCcExpYear(): ?int
    {
        return $this->cc_exp_year;
    }

    public function setCcExpYear(int $cc_exp_year): self
    {
        $this->cc_exp_year = $cc_exp_year;

        return $this;
    }

    public function getCcSecCode(): ?int
    {
        return $this->cc_sec_code;
    }

    public function setCcSecCode(int $cc_sec_code): self
    {
        $this->cc_sec_code = $cc_sec_code;

        return $this;
    }

    public function getPrimaryPayment(): ?bool
    {
        return $this->primary_payment;
    }

    public function setPrimaryPayment(bool $primary_payment): self
    {
        $this->primary_payment = $primary_payment;

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

    /**
     * @return Collection|OrderDetails[]
     */
    public function getLiOrderDetails(): Collection
    {
        return $this->liOrderDetails;
    }

    public function addLiOrderDetail(OrderDetails $liOrderDetail): self
    {
        if (!$this->liOrderDetails->contains($liOrderDetail)) {
            $this->liOrderDetails[] = $liOrderDetail;
            $liOrderDetail->setPayment($this);
        }

        return $this;
    }

    public function removeLiOrderDetail(OrderDetails $liOrderDetail): self
    {
        if ($this->liOrderDetails->removeElement($liOrderDetail)) {
            // set the owning side to null (unless already changed)
            if ($liOrderDetail->getPayment() === $this) {
                $liOrderDetail->setPayment(null);
            }
        }

        return $this;
    }
}
