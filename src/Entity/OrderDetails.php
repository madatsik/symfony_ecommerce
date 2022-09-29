<?php

namespace App\Entity;

use App\Repository\OrderDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderDetailsRepository::class)
 */
class OrderDetails
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $payment_date;

    /**
     * @ORM\Column(type="date")
     */
    private $order_date;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $ship_date;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $ship_method;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fullfillment_date;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $cancellation_date;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $return_date;

    /**
     * @ORM\ManyToOne(targetEntity=Payment::class, inversedBy="liOrderDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $payment;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="liOrderDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;

    /**
     * @ORM\OneToOne(targetEntity=Cart::class, mappedBy="order_details", cascade={"persist", "remove"})
     */
    private $cart;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaymentDate(): ?\DateTimeInterface
    {
        return $this->payment_date;
    }

    public function setPaymentDate(?\DateTimeInterface $payment_date): self
    {
        $this->payment_date = $payment_date;

        return $this;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->order_date;
    }

    public function setOrderDate(\DateTimeInterface $order_date): self
    {
        $this->order_date = $order_date;

        return $this;
    }

    public function getShipDate(): ?\DateTimeInterface
    {
        return $this->ship_date;
    }

    public function setShipDate(?\DateTimeInterface $ship_date): self
    {
        $this->ship_date = $ship_date;

        return $this;
    }

    public function getShipMethod(): ?string
    {
        return $this->ship_method;
    }

    public function setShipMethod(string $ship_method): self
    {
        $this->ship_method = $ship_method;

        return $this;
    }

    public function getFullfillmentDate(): ?\DateTimeInterface
    {
        return $this->fullfillment_date;
    }

    public function setFullfillmentDate(?\DateTimeInterface $fullfillment_date): self
    {
        $this->fullfillment_date = $fullfillment_date;

        return $this;
    }

    public function getCancellationDate(): ?\DateTimeInterface
    {
        return $this->cancellation_date;
    }

    public function setCancellationDate(?\DateTimeInterface $cancellation_date): self
    {
        $this->cancellation_date = $cancellation_date;

        return $this;
    }

    public function getReturnDate(): ?\DateTimeInterface
    {
        return $this->return_date;
    }

    public function setReturnDate(?\DateTimeInterface $return_date): self
    {
        $this->return_date = $return_date;

        return $this;
    }

    public function getPayment(): ?Payment
    {
        return $this->payment;
    }

    public function setPayment(?Payment $payment): self
    {
        $this->payment = $payment;

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

    public function getCart(): ?Cart
    {
        return $this->cart;
    }

    public function setCart(Cart $cart): self
    {
        // set the owning side of the relation if necessary
        if ($cart->getOrderDetails() !== $this) {
            $cart->setOrderDetails($this);
        }

        $this->cart = $cart;

        return $this;
    }
}
