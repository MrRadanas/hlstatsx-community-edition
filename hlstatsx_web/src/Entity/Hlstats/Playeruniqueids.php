<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\PlayeruniqueidsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsPlayeruniqueids.
 *
 * @ORM\Table(name="hlstats_PlayerUniqueIds", indexes={@ORM\Index(name="playerId", columns={"playerId"})})
 *
 * @ORM\Entity(repositoryClass=PlayeruniqueidsRepository::class)
 */
class Playeruniqueids
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
    private $game = '';

    /**
     * @var int
     *
     * @ORM\Column(name="playerId", type="integer", nullable=false, options={"unsigned": true})
     */
    private $playerid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="uniqueId", type="string", length=64, nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $uniqueid = '';

    /**
     * @var int|null
     *
     * @ORM\Column(name="merge", type="integer", nullable=true, options={"unsigned": true})
     */
    private $merge;

    public function getGame(): string
    {
        return $this->game;
    }

    public function setGame(string $game): Playeruniqueids
    {
        $this->game = $game;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getPlayerid()
    {
        return $this->playerid;
    }

    /**
     * @param int|string $playerid
     *
     * @return Playeruniqueids
     */
    public function setPlayerid($playerid)
    {
        $this->playerid = $playerid;

        return $this;
    }

    public function getUniqueid(): string
    {
        return $this->uniqueid;
    }

    public function setUniqueid(string $uniqueid): Playeruniqueids
    {
        $this->uniqueid = $uniqueid;

        return $this;
    }

    public function getMerge(): int
    {
        return $this->merge;
    }

    public function setMerge(int $merge): Playeruniqueids
    {
        $this->merge = $merge;

        return $this;
    }
}
