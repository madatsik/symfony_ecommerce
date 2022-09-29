<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 */
class Customer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Phone::class, mappedBy="customer", orphanRemoval=true)
     */
    private $liPhone;

    /**
     * @ORM\OneToMany(targetEntity=Email::class, mappedBy="customer", orphanRemoval=true)
     */
    private $liEmail;

    /**
     * @ORM\OneToMany(targetEntity=Payment::class, mappedBy="customer")
     */
    private $liPayment;

    /**
     * @ORM\OneToMany(targetEntity=Address::class, mappedBy="customer")
     */
    private $liAddress;

    /**
     * @ORM\OneToMany(targetEntity=OrderDetails::class, mappedBy="customer", orphanRemoval=true)
     */
    private $liOrderDetails;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $last_name;

    /**
     * @ORM\Column(type="date")
     */
    private $dob;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $gender;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $primary_address;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $primary_phone;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $primary_email;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $primary_payment;

    public function __construct()
    {
        $this->liPhone = new ArrayCollection();
        $this->liEmail = new ArrayCollection();
        $this->liPayment = new ArrayCollection();
        $this->liAddress = new ArrayCollection();
        $this->liOrderDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Phone[]
     */
    public function getLiPhone(): Collection
    {
        return $this->liPhone;
    }

    public function addLiPhone(Phone $liPhone): self
    {
        if (!$this->liPhone->contains($liPhone)) {
            $this->liPhone[] = $liPhone;
            $liPhone->setCustomer($this);
        }

        return $this;
    }

    public function removeLiPhone(Phone $liPhone): self
    {
        if ($this->liPhone->removeElement($liPhone)) {
            // set the owning side to null (unless already changed)
            if ($liPhone->getCustomer() === $this) {
                $liPhone->setCustomer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Email[]
     */
    public function getLiEmail(): Collection
    {
        return $this->liEmail;
    }

    public function addLiEmail(Email $liEmail): self
    {
        if (!$this->liEmail->contains($liEmail)) {
            $this->liEmail[] = $liEmail;
            $liEmail->setCustomer($this);
        }

        return $this;
    }

    public function removeLiEmail(Email $liEmail): self
    {
        if ($this->liEmail->removeElement($liEmail)) {
            // set the owning side to null (unless already changed)
            if ($liEmail->getCustomer() === $this) {
                $liEmail->setCustomer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Payment[]
     */
    public function getLiPayment(): Collection
    {
        return $this->liPayment;
    }

    public function addLiPayment(Payment $liPayment): self
    {
        if (!$this->liPayment->contains($liPayment)) {
            $this->liPayment[] = $liPayment;
            $liPayment->setCustomer($this);
        }

        return $this;
    }

    public function removeLiPayment(Payment $liPayment): self
    {
        if ($this->liPayment->removeElement($liPayment)) {
            // set the owning side to null (unless already changed)
            if ($liPayment->getCustomer() === $this) {
                $liPayment->setCustomer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Address[]
     */
    public function getLiAddress(): Collection
    {
        return $this->liAddress;
    }

    public function addLiAddress(Address $liAddress): self
    {
        if (!$this->liAddress->contains($liAddress)) {
            $this->liAddress[] = $liAddress;
            $liAddress->setCustomer($this);
        }

        return $this;
    }

    public function removeLiAddress(Address $liAddress): self
    {
        if ($this->liAddress->removeElement($liAddress)) {
            // set the owning side to null (unless already changed)
            if ($liAddress->getCustomer() === $this) {
                $liAddress->setCustomer(null);
            }
        }

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
            $liOrderDetail->setCustomer($this);
        }

        return $this;
    }

    public function removeLiOrderDetail(OrderDetails $liOrderDetail): self
    {
        if ($this->liOrderDetails->removeElement($liOrderDetail)) {
            // set the owning side to null (unless already changed)
            if ($liOrderDetail->getCustomer() === $this) {
                $liOrderDetail->setCustomer(null);
            }
        }

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getDob(): ?\DateTimeInterface
    {
        return $this->dob;
    }

    public function setDob(\DateTimeInterface $dob): self
    {
        $this->dob = $dob;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getPrimaryAddress(): ?int
    {
        return $this->primary_address;
    }

    public function setPrimaryAddress(?int $primary_address): self
    {
        $this->primary_address = $primary_address;

        return $this;
    }

    public function getPrimaryPhone(): ?int
    {
        return $this->primary_phone;
    }

    public function setPrimaryPhone(?int $primary_phone): self
    {
        $this->primary_phone = $primary_phone;

        return $this;
    }

    public function getPrimaryEmail(): ?int
    {
        return $this->primary_email;
    }

    public function setPrimaryEmail(?int $primary_email): self
    {
        $this->primary_email = $primary_email;

        return $this;
    }

    public function getPrimaryPayment(): ?int
    {
        return $this->primary_payment;
    }

    public function setPrimaryPayment(?int $primary_payment): self
    {
        $this->primary_payment = $primary_payment;

        return $this;
    }
}
