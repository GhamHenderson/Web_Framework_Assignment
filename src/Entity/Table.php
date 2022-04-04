<?php

namespace App\Entity;

use App\Repository\TableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TableRepository::class)]
#[ORM\Table(name: '`table`')]
class Table
{

    public function __toString(): string
    {
        return $this->id;
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;


    #[ORM\Column(type: 'integer')]
    private $TableCapacity;

    #[ORM\ManyToOne(targetEntity: Status::class, inversedBy: 'tables')]
    private $statusType;

    #[ORM\OneToMany(mappedBy: 'seat', targetEntity: Checkout::class)]
    private $checkouts;

    public function __construct()
    {
        $this->checkouts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getTableCapacity(): ?int
    {
        return $this->TableCapacity;
    }

    public function setTableCapacity(int $TableCapacity): self
    {
        $this->TableCapacity = $TableCapacity;

        return $this;
    }

    public function getStatusType(): ?Status
    {
        return $this->statusType;
    }

    public function setStatusType(?Status $statusType): self
    {
        $this->statusType = $statusType;

        return $this;
    }

    /**
     * @return Collection<int, Checkout>
     */
    public function getCheckouts(): Collection
    {
        return $this->checkouts;
    }

    public function addCheckout(Checkout $checkout): self
    {
        if (!$this->checkouts->contains($checkout)) {
            $this->checkouts[] = $checkout;
            $checkout->setSeat($this);
        }

        return $this;
    }

    public function removeCheckout(Checkout $checkout): self
    {
        if ($this->checkouts->removeElement($checkout)) {
            // set the owning side to null (unless already changed)
            if ($checkout->getSeat() === $this) {
                $checkout->setSeat(null);
            }
        }

        return $this;
    }
}
