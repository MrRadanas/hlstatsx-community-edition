<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsChangeteamRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsEventsChangeteam.
 *
 * @ORM\Table(name="hlstats_Events_ChangeTeam", indexes={@ORM\Index(name="playerId", columns={"playerId"})})
 *
 * @ORM\Entity(repositoryClass=EventsChangeteamRepository::class)
 */
class EventsChangeteam
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
     * @ORM\Column(name="team", type="string", length=64, nullable=false)
     */
    private $team = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): EventsChangeteam
    {
        $this->id = $id;

        return $this;
    }

    public function getEventtime(): \DateTime
    {
        return $this->eventtime;
    }

    public function setEventtime(\DateTime $eventtime): EventsChangeteam
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
     * @return EventsChangeteam
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

    public function setMap(string $map): EventsChangeteam
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
     * @return EventsChangeteam
     */
    public function setPlayerid($playerid)
    {
        $this->playerid = $playerid;

        return $this;
    }

    public function getTeam(): string
    {
        return $this->team;
    }

    public function setTeam(string $team): EventsChangeteam
    {
        $this->team = $team;

        return $this;
    }
}
