<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\ServersConfigDefaultRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'hlstats_Servers_Config_Default')]
#[ORM\Entity(repositoryClass: ServersConfigDefaultRepository::class)]
class ServersConfigDefault
{
    #[ORM\Column(name: 'parameter', type: 'string', length: 50, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private string $parameter;

    #[ORM\Column(name: 'value', type: 'string', length: 128, nullable: false)]
    private string $value;

    #[ORM\Column(name: 'description', type: 'text', length: 16777215, nullable: true)]
    private ?string $description;

    public function getParameter(): string
    {
        return $this->parameter;
    }

    public function setParameter(string $parameter): static
    {
        $this->parameter = $parameter;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
