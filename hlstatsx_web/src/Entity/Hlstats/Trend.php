<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\TrendRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsTrend.
 *
 * @ORM\Table(name="hlstats_Trend", indexes={@ORM\Index(name="game", columns={"game"}), @ORM\Index(name="timestamp", columns={"timestamp"})})
 *
 * @ORM\Entity(repositoryClass=TrendRepository::class)
 */
class Trend
{
    /**
     * @var int
     *
     * @ORM\Column(name="timestamp", type="integer", nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $timestamp = '0';

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
     * @ORM\Column(name="players", type="integer", nullable=false)
     */
    private $players = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="kills", type="integer", nullable=false)
     */
    private $kills = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="headshots", type="integer", nullable=false)
     */
    private $headshots = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="servers", type="integer", nullable=false)
     */
    private $servers = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="act_slots", type="integer", nullable=false)
     */
    private $actSlots = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="max_slots", type="integer", nullable=false)
     */
    private $maxSlots = '0';

    /**
     * @return int|string
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param int|string $timestamp
     *
     * @return Trend
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getGame(): string
    {
        return $this->game;
    }

    public function setGame(string $game): Trend
    {
        $this->game = $game;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @param int|string $players
     *
     * @return Trend
     */
    public function setPlayers($players)
    {
        $this->players = $players;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getKills()
    {
        return $this->kills;
    }

    /**
     * @param int|string $kills
     *
     * @return Trend
     */
    public function setKills($kills)
    {
        $this->kills = $kills;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getHeadshots()
    {
        return $this->headshots;
    }

    /**
     * @param int|string $headshots
     *
     * @return Trend
     */
    public function setHeadshots($headshots)
    {
        $this->headshots = $headshots;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getServers()
    {
        return $this->servers;
    }

    /**
     * @param int|string $servers
     *
     * @return Trend
     */
    public function setServers($servers)
    {
        $this->servers = $servers;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getActSlots()
    {
        return $this->actSlots;
    }

    /**
     * @param int|string $actSlots
     *
     * @return Trend
     */
    public function setActSlots($actSlots)
    {
        $this->actSlots = $actSlots;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getMaxSlots()
    {
        return $this->maxSlots;
    }

    /**
     * @param int|string $maxSlots
     *
     * @return Trend
     */
    public function setMaxSlots($maxSlots)
    {
        $this->maxSlots = $maxSlots;

        return $this;
    }
}
