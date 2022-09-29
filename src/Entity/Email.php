<?php

namespace App\Entity;

use App\Repository\EmailRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmailRepository::class)
 */
class Email
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=254)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $email_type;

    /**
     * @ORM\Column(type="boolean")
     */
    private $primary_email;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="liEmail")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEmailType(): ?string
    {
        return $this->email_type;
    }

    public function setEmailType(string $email_type): self
    {
        $this->email_type = $email_type;

        return $this;
    }

    public function getPrimaryEmail(): ?bool
    {
        return $this->primary_email;
    }

    public function setPrimaryEmail(bool $primary_email): self
    {
        $this->primary_email = $primary_email;

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
