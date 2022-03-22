<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'time')]
    private $OrderTime;

    #[ORM\Column(type: 'date')]
    private $orderDate;

    #[ORM\Column(type: 'float')]
    private $orderTotal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderTime(): ?\DateTimeInterface
    {
        return $this->OrderTime;
    }

    public function setOrderTime(\DateTimeInterface $OrderTime): self
    {
        $this->OrderTime = $OrderTime;

        return $this;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->orderDate;
    }

    public function setOrderDate(\DateTimeInterface $orderDate): self
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    public function getOrderTotal(): ?float
    {
        return $this->orderTotal;
    }

    public function setOrderTotal(float $orderTotal): self
    {
        $this->orderTotal = $orderTotal;

        return $this;
    }
}
