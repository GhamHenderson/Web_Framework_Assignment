<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $itemName;

    #[ORM\Column(type: 'float')]
    private $ItemPrice;

    #[ORM\Column(type: 'string', length: 255)]
    private $ItemDescription;

    #[ORM\Column(type: 'boolean')]
    private $isAvailable;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemName(): ?string
    {
        return $this->itemName;
    }

    public function setItemName(string $itemName): self
    {
        $this->itemName = $itemName;

        return $this;
    }

    public function getItemPrice(): ?float
    {
        return $this->ItemPrice;
    }

    public function setItemPrice(float $ItemPrice): self
    {
        $this->ItemPrice = $ItemPrice;

        return $this;
    }

    public function getItemDescription(): ?string
    {
        return $this->ItemDescription;
    }

    public function setItemDescription(string $ItemDescription): self
    {
        $this->ItemDescription = $ItemDescription;

        return $this;
    }

    public function getIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): self
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }
}
