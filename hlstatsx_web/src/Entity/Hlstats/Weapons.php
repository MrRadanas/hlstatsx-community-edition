<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\WeaponsRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Table(name: 'hlstats_Weapons')]
#[ORM\Index(name: 'code', columns: ['code'])]
#[ORM\Index(name: 'modifier', columns: ['modifier'])]
#[ORM\UniqueConstraint(name: 'gamecode', columns: ['game', 'code'])]
#[ORM\Entity(repositoryClass: WeaponsRepository::class)]
class Weapons
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'weaponId', type: 'integer', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[ManyToOne(targetEntity: Games::class)]
    #[JoinColumn(name: 'game', referencedColumnName: 'code', nullable: false)]
    private Games $game;

    #[ORM\Column(name: 'code', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $code = '';

    #[ORM\Column(name: 'name', type: 'string', length: 128, nullable: false, options: ['default' => ''])]
    private string $name = '';

    #[ORM\Column(name: 'modifier', type: 'float', precision: 10, scale: 2, nullable: false, options: ['default' => 1.00])]
    private float $modifier = 1.00;

    #[ORM\Column(name: 'kills', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $kills = 0;

    #[ORM\Column(name: 'headshots', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $headshots = 0;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getGame(): Games
    {
        return $this->game;
    }

    public function setGame(Games $game): static
    {
        $this->game = $game;

        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): static
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

    public function getModifier(): float
    {
        return $this->modifier;
    }

    public function setModifier(float $modifier): static
    {
        $this->modifier = $modifier;

        return $this;
    }

    public function getKills(): int
    {
        return $this->kills;
    }

    public function setKills(int $kills): static
    {
        $this->kills = $kills;

        return $this;
    }

    public function getHeadshots(): int
    {
        return $this->headshots;
    }

    public function setHeadshots(int $headshots): static
    {
        $this->headshots = $headshots;

        return $this;
    }
}
