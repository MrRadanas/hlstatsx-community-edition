<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\PlayersRibbonsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsPlayersRibbons.
 *
 * @ORM\Table(name="hlstats_Players_Ribbons")
 *
 * @ORM\Entity(repositoryClass=PlayersRibbonsRepository::class)
 */
class PlayersRibbons
{
    /**
     * @var int
     *
     * @ORM\Column(name="playerId", type="integer", nullable=false, options={"unsigned": true})
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $playerid = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="ribbonId", type="integer", nullable=false, options={"unsigned": true})
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ribbonid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="game", type="string", length=32, nullable=false)
     */
    private $game;

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
     * @return PlayersRibbons
     */
    public function setPlayerid($playerid)
    {
        $this->playerid = $playerid;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getRibbonid()
    {
        return $this->ribbonid;
    }

    /**
     * @param int|string $ribbonid
     *
     * @return PlayersRibbons
     */
    public function setRibbonid($ribbonid)
    {
        $this->ribbonid = $ribbonid;

        return $this;
    }

    public function getGame(): string
    {
        return $this->game;
    }

    public function setGame(string $game): PlayersRibbons
    {
        $this->game = $game;

        return $this;
    }
}
