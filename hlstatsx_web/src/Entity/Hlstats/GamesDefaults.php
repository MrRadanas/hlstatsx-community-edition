<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\GamesDefaultsRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Table(name: 'hlstats_Games_Defaults')]
#[ORM\Entity(repositoryClass: GamesDefaultsRepository::class)]
class GamesDefaults
{
    //    #[ORM\Column(name: 'code', type: 'string', length: 32, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ManyToOne(targetEntity: Games::class)]
    #[JoinColumn(name: 'code', referencedColumnName: 'code')]
    private Games $code;

    #[ORM\Column(name: 'parameter', type: 'string', length: 50, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private string $parameter;

    #[ORM\Column(name: 'value', type: 'string', length: 128, nullable: false)]
    private string $value;

    public function getCode(): Games
    {
        return $this->code;
    }

    public function setCode(Games $code): static
    {
        $this->code = $code;

        return $this;
    }

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
}
