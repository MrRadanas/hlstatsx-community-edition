<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\MapsCountsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsMapsCounts.
 *
 * @ORM\Table(name="hlstats_Maps_Counts", indexes={@ORM\Index(name="rowId", columns={"rowId"})})
 *
 * @ORM\Entity(repositoryClass=MapsCountsRepository::class)
 */
class MapsCounts
{
    /**
     * @var string
     *
     * @ORM\Column(name="game", type="string", length=32, nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $game;

    /**
     * @var string
     *
     * @ORM\Column(name="map", type="string", length=64, nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $map;

    /**
     * @var int
     *
     * @ORM\Column(name="rowId", type="integer", nullable=false)
     */
    private $rowid;

    /**
     * @var int
     *
     * @ORM\Column(name="kills", type="integer", nullable=false)
     */
    private $kills;

    /**
     * @var int
     *
     * @ORM\Column(name="headshots", type="integer", nullable=false)
     */
    private $headshots;

    public function getGame(): string
    {
        return $this->game;
    }

    public function setGame(string $game): MapsCounts
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

    public function getRowid(): int
    {
        return $this->rowid;
    }

    public function setRowid(int $rowid): MapsCounts
    {
        $this->rowid = $rowid;

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
