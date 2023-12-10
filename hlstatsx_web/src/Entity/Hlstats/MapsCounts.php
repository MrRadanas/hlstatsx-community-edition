<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\MapsCountsRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Table(name: 'hlstats_Maps_Counts')]
#[ORM\Index(name: 'rowId', columns: ['rowId'])]
#[ORM\Entity(repositoryClass: MapsCountsRepository::class)]
class MapsCounts
{
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(name: 'rowId', type: 'integer', nullable: false)]
    private int $rowid;

    #[ManyToOne(targetEntity: Games::class)]
    #[JoinColumn(name: 'code', referencedColumnName: 'code')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private Games $game;

    #[ORM\Column(name: 'map', type: 'string', length: 64, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private string $map;

    #[ORM\Column(name: 'kills', type: 'integer', nullable: false)]
    private int $kills;

    #[ORM\Column(name: 'headshots', type: 'integer', nullable: false)]
    private int $headshots;

    public function getRowid(): int
    {
        return $this->rowid;
    }

    public function setRowid(int $rowid): MapsCounts
    {
        $this->rowid = $rowid;

        return $this;
    }

    public function getGame(): Games
    {
        return $this->game;
    }

    public function setGame(Games $game): MapsCounts
    {
        $this->game = $game;

        return $this;
    }

    public function getMap(): string
    {
        return $this->map;
    }

    public function setMap(string $map): MapsCounts
    {
        $this->map = $map;

        return $this;
    }

    public function getKills(): int
    {
        return $this->kills;
    }

    public function setKills(int $kills): MapsCounts
    {
        $this->kills = $kills;

        return $this;
    }

    public function getHeadshots(): int
    {
        return $this->headshots;
    }

    public function setHeadshots(int $headshots): MapsCounts
    {
        $this->headshots = $headshots;

        return $this;
    }
}
