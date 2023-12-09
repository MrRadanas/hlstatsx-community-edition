<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsRconRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsEventsRcon.
 *
 * @ORM\Table(name="hlstats_Events_Rcon")
 *
 * @ORM\Entity(repositoryClass=EventsRconRepository::class)
 */
class EventsRcon
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=6, nullable=false, options={"default": "UNK"})
     */
    private $type = 'UNK';

    /**
     * @var string
     *
     * @ORM\Column(name="remoteIp", type="string", length=32, nullable=false)
     */
    private $remoteip = '';

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=128, nullable=false)
     */
    private $password = '';

    /**
     * @var string
     *
     * @ORM\Column(name="command", type="string", length=255, nullable=false)
     */
    private $command = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): EventsRcon
    {
        $this->id = $id;

        return $this;
    }

    public function getEventtime(): \DateTime
    {
        return $this->eventtime;
    }

    public function setEventtime(\DateTime $eventtime): EventsRcon
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
     * @return EventsRcon
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

    public function setMap(string $map): EventsRcon
    {
        $this->map = $map;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): EventsRcon
    {
        $this->type = $type;

        return $this;
    }

    public function getRemoteip(): string
    {
        return $this->remoteip;
    }

    public function setRemoteip(string $remoteip): EventsRcon
    {
        $this->remoteip = $remoteip;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): EventsRcon
    {
        $this->password = $password;

        return $this;
    }

    public function getCommand(): string
    {
        return $this->command;
    }

    public function setCommand(string $command): EventsRcon
    {
        $this->command = $command;

        return $this;
    }
}
