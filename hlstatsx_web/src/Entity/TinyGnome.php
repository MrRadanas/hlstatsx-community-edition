<?php

namespace App\Entity;

use App\Repository\TinyGnomeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TinyGnomeRepository::class)]
class TinyGnome
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $puk = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPuk(): ?string
    {
        return $this->puk;
    }

    public function setPuk(string $puk): static
    {
        $this->puk = $puk;

        return $this;
    }
}
