<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsConnectsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsEventsConnects.
 *
 * @ORM\Table(name="hlstats_Events_Connects", indexes={@ORM\Index(name="playerId", columns={"playerId"})})
 *
 * @ORM\Entity(repositoryClass=EventsConnectsRepository::class)
 */
class EventsConnects
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
     * @ORM\Column(name="ipAddress", type="string", length=32, nullable=false)
     */
    private $ipaddress = '';

    /**
     * @var string
     *
     * @ORM\Column(name="hostname", type="string", length=255, nullable=false)
     */
    private $hostname = '';

    /**
     * @var string
     *
     * @ORM\Column(name="hostgroup", type="string", length=255, nullable=false)
     */
    private $hostgroup = '';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="eventTime_Disconnect", type="datetime", nullable=true)
     */
    private $eventtimeDisconnect;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): EventsConnects
    {
        $this->id = $id;

        return $this;
    }

    public function getEventtime(): \DateTime
    {
        return $this->eventtime;
    }

    public function setEventtime(\DateTime $eventtime): EventsConnects
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
     * @return EventsConnects
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

    public function setMap(string $map): EventsConnects
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
     * @return EventsConnects
     */
    public function setPlayerid($playerid)
    {
        $this->playerid = $playerid;

        return $this;
    }

    public function getIpaddress(): string
    {
        return $this->ipaddress;
    }

    public function setIpaddress(string $ipaddress): EventsConnects
    {
        $this->ipaddress = $ipaddress;

        return $this;
    }

    public function getHostname(): string
    {
        return $this->hostname;
    }

    public function setHostname(string $hostname): EventsConnects
    {
        $this->hostname = $hostname;

        return $this;
    }

    public function getHostgroup(): string
    {
        return $this->hostgroup;
    }

    public function setHostgroup(string $hostgroup): EventsConnects
    {
        $this->hostgroup = $hostgroup;

        return $this;
    }

    public function getEventtimeDisconnect(): \DateTime
    {
        return $this->eventtimeDisconnect;
    }

    public function setEventtimeDisconnect(\DateTime $eventtimeDisconnect): EventsConnects
    {
        $this->eventtimeDisconnect = $eventtimeDisconnect;

        return $this;
    }
}
