<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsStatsmeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsEventsStatsme.
 *
 * @ORM\Table(name="hlstats_Events_Statsme", indexes={@ORM\Index(name="playerId", columns={"playerId"}), @ORM\Index(name="weapon", columns={"weapon"})})
 *
 * @ORM\Entity(repositoryClass=EventsStatsmeRepository::class)
 */
class EventsStatsme
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned": true})
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="eventTime", type="datetime", nullable=true)
     */
    private $eventtime;

    /**
     * @var int
     *
     * @ORM\Column(name="serverId", type="integer", nullable=false, options={"unsigned": true})
     */
    private $serverid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="map", type="string", length=64, nullable=false)
     */
    private $map = '';

    /**
     * @var int
     *
     * @ORM\Column(name="playerId", type="integer", nullable=false, options={"unsigned": true})
     */
    private $playerid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="weapon", type="string", length=64, nullable=false)
     */
    private $weapon = '';

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

    /**
     * @var int
     *
     * @ORM\Column(name="headshots", type="integer", nullable=false, options={"unsigned": true})
     */
    private $headshots = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="damage", type="integer", nullable=false, options={"unsigned": true})
     */
    private $damage = '0';

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

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): EventsStatsme
    {
        $this->id = $id;

        return $this;
    }

    public function getEventtime(): \DateTime
    {
        return $this->eventtime;
    }

    public function setEventtime(\DateTime $eventtime): EventsStatsme
    {
        $this->eventtime = $eventtime;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getServerid()
    {
        return $this->serverid;
    }

    /**
     * @param int|string $serverid
     *
     * @return EventsStatsme
     */
    public function setServerid($serverid)
    {
        $this->serverid = $serverid;

        return $this;
    }

    public function getMap(): string
    {
        return $this->map;
    }

    public function setMap(string $map): EventsStatsme
    {
        $this->map = $map;

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
     * @return EventsStatsme
     */
    public function setPlayerid($playerid)
    {
        $this->playerid = $playerid;

        return $this;
    }

    public function getWeapon(): string
    {
        return $this->weapon;
    }

    public function setWeapon(string $weapon): EventsStatsme
    {
        $this->weapon = $weapon;

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
     * @return EventsStatsme
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
     * @return EventsStatsme
     */
    public function setHits($hits)
    {
        $this->hits = $hits;

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
     * @return EventsStatsme
     */
    public function setHeadshots($headshots)
    {
        $this->headshots = $headshots;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * @param int|string $damage
     *
     * @return EventsStatsme
     */
    public function setDamage($damage)
    {
        $this->damage = $damage;

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
     * @return EventsStatsme
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
     * @return EventsStatsme
     */
    public function setDeaths($deaths)
    {
        $this->deaths = $deaths;

        return $this;
    }
}
