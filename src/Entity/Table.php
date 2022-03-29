<?php

namespace App\Entity;

use App\Repository\TableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TableRepository::class)]
#[ORM\Table(name: '`table`')]
class Table
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'boolean')]
    private $TableAvailable;

    #[ORM\Column(type: 'integer')]
    private $TableCapacity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTableAvailable(): ?bool
    {
        return $this->TableAvailable;
    }

    public function setTableAvailable(bool $TableAvailable): self
    {
        $this->TableAvailable = $TableAvailable;

        return $this;
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
}
