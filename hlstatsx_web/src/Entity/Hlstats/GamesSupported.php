<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\GamesSupportedRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Table(name: 'hlstats_Games_Supported')]
#[ORM\Entity(repositoryClass: GamesSupportedRepository::class)]
class GamesSupported
{
    //    #[ORM\Column(name: 'code', type: 'string', length: 32, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ManyToOne(targetEntity: Games::class)]
    #[JoinColumn(name: 'code', referencedColumnName: 'code')]
    private Games $code;

    #[ORM\Column(name: 'name', type: 'string', length: 128, nullable: false)]
    private string $name;

    public function getCode(): Games
    {
        return $this->code;
    }

    public function setCode(Games $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
