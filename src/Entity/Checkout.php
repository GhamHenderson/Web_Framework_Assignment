<?php

namespace App\Entity;

use App\Repository\CheckoutRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CheckoutRepository::class)]
class Checkout
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $NameOnCard;

    #[ORM\Column(type: 'string', length: 255)]
    private $cardNumber;

    #[ORM\ManyToOne(targetEntity: Table::class, inversedBy: 'checkouts')]
    private $seat;

    #[ORM\Column(type: 'date')]
    private $expiryDate;

    #[ORM\Column(type: 'boolean')]
    private $paymentAccepted = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameOnCard(): ?string
    {
        return $this->NameOnCard;
    }

    public function setNameOnCard(string $NameOnCard): self
    {
        $this->NameOnCard = $NameOnCard;

        return $this;
    }

    public function getCardNumber(): ?string
    {
        return $this->cardNumber;
    }

    public function setCardNumber(string $cardNumber): self
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    public function getSeat(): ?Table
    {
        return $this->seat;
    }

    public function setSeat(?Table $seat): self
    {
        $this->seat = $seat;

        return $this;
    }

    public function getExpiryDate(): ?\DateTimeInterface
    {
        return $this->expiryDate;
    }

    public function setExpiryDate(\DateTimeInterface $expiryDate): self
    {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    public function getPaymentAccepted(): ?bool
    {
        return $this->paymentAccepted;
    }

    public function setPaymentAccepted(bool $paymentAccepted): self
    {

        $this->paymentAccepted = $paymentAccepted;
        if ($this == null){
            $this->paymentAccepted = true;
        }

        return $this;
    }
}
