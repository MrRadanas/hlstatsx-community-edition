<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsChangenameRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsEventsChangename.
 *
 * @ORM\Table(name="hlstats_Events_ChangeName", indexes={@ORM\Index(name="playerId", columns={"playerId"})})
 *
 * @ORM\Entity(repositoryClass=EventsChangenameRepository::class)
 */
class EventsChangename
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
     * @ORM\Column(name="oldName", type="string", length=64, nullable=false)
     */
    private $oldname = '';

    /**
     * @var string
     *
     * @ORM\Column(name="newName", type="string", length=64, nullable=false)
     */
    private $newname = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): EventsChangename
    {
        $this->id = $id;

        return $this;
    }

    public function getEventtime(): \DateTime
    {
        return $this->eventtime;
    }

    public function setEventtime(\DateTime $eventtime): EventsChangename
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
     * @return EventsChangename
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

    public function setMap(string $map): EventsChangename
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
     * @return EventsChangename
     */
    public function setPlayerid($playerid)
    {
        $this->playerid = $playerid;

        return $this;
    }

    public function getOldname(): string
    {
        return $this->oldname;
    }

    public function setOldname(string $oldname): EventsChangename
    {
        $this->oldname = $oldname;

        return $this;
    }

    public function getNewname(): string
    {
        return $this->newname;
    }

    public function setNewname(string $newname): EventsChangename
    {
        $this->newname = $newname;

        return $this;
    }
}
