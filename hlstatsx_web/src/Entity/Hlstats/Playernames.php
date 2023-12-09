<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\PlayernamesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsPlayernames.
 *
 * @ORM\Table(name="hlstats_PlayerNames", indexes={@ORM\Index(name="name16", columns={"name"})})
 *
 * @ORM\Entity(repositoryClass=PlayernamesRepository::class)
 */
class Playernames
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $name = '';

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
     * @var \DateTime|null
     *
     * @ORM\Column(name="lastuse", type="datetime", nullable=true)
     */
    private $lastuse;

    /**
     * @var int
     *
     * @ORM\Column(name="connection_time", type="integer", nullable=false, options={"unsigned": true})
     */
    private $connectionTime = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="numuses", type="integer", nullable=false, options={"unsigned": true})
     */
    private $numuses = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="kills", type="integer", nullable=false, options={"unsigned": true})
     */
    private $kills = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="deaths", type="integer", nullable=false, options={"unsigned": true})
     */
    private $deaths = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="suicides", type="integer", nullable=false, options={"unsigned": true})
     */
    private $suicides = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="headshots", type="integer", nullable=false, options={"unsigned": true})
     */
    private $headshots = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="shots", type="integer", nullable=false, options={"unsigned": true})
     */
    private $shots = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="hits", type="integer", nullable=false, options={"unsigned": true})
     */
    private $hits = '0';

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Playernames
    {
        $this->name = $name;

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
     * @return Playernames
     */
    public function setPlayerid($playerid)
    {
        $this->playerid = $playerid;

        return $this;
    }

    public function getLastuse(): \DateTime
    {
        return $this->lastuse;
    }

    public function setLastuse(\DateTime $lastuse): Playernames
    {
        $this->lastuse = $lastuse;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getConnectionTime()
    {
        return $this->connectionTime;
    }

    /**
     * @param int|string $connectionTime
     *
     * @return Playernames
     */
    public function setConnectionTime($connectionTime)
    {
        $this->connectionTime = $connectionTime;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getNumuses()
    {
        return $this->numuses;
    }

    /**
     * @param int|string $numuses
     *
     * @return Playernames
     */
    public function setNumuses($numuses)
    {
        $this->numuses = $numuses;

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
     * @return Playernames
     */
    public function setKills($kills)
    {
        $this->kills = $kills;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getDeaths()
    {
        return $this->deaths;
    }

    /**
     * @param int|string $deaths
     *
     * @return Playernames
     */
    public function setDeaths($deaths)
    {
        $this->deaths = $deaths;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getSuicides()
    {
        return $this->suicides;
    }

    /**
     * @param int|string $suicides
     *
     * @return Playernames
     */
    public function setSuicides($suicides)
    {
        $this->suicides = $suicides;

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
     * @return Playernames
     */
    public function setHeadshots($headshots)
    {
        $this->headshots = $headshots;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getShots()
    {
        return $this->shots;
    }

    /**
     * @param int|string $shots
     *
     * @return Playernames
     */
    public function setShots($shots)
    {
        $this->shots = $shots;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * @param int|string $hits
     *
     * @return Playernames
     */
    public function setHits($hits)
    {
        $this->hits = $hits;

        return $this;
    }
}
