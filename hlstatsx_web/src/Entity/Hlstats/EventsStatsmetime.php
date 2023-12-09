<?php

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsStatsmetimeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsEventsStatsmetime.
 *
 * @ORM\Table(name="hlstats_Events_StatsmeTime", indexes={@ORM\Index(name="playerId", columns={"playerId"})})
 *
 * @ORM\Entity(repositoryClass=EventsStatsmetimeRepository::class)
 */
class EventsStatsmetime
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
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="time", nullable=false, options={"default": "00:00:00"})
     */
    private $time = '00:00:00';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): EventsStatsmetime
    {
        $this->id = $id;

        return $this;
    }

    public function getEventtime(): \DateTime
    {
        return $this->eventtime;
    }

    public function setEventtime(\DateTime $eventtime): EventsStatsmetime
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
     * @return EventsStatsmetime
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

    public function setMap(string $map): EventsStatsmetime
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
     * @return EventsStatsmetime
     */
    public function setPlayerid($playerid)
    {
        $this->playerid = $playerid;

        return $this;
    }

    /**
     * @return \DateTime|string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param \DateTime|string $time
     *
     * @return EventsStatsmetime
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }
}
