<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsAdminRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsEventsAdmin.
 *
 * @ORM\Table(name="hlstats_Events_Admin")
 *
 * @ORM\Entity(repositoryClass=EventsAdminRepository::class)
 */
class EventsAdmin
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
     * @ORM\Column(name="type", type="string", length=64, nullable=false, options={"default": "Unknown"})
     */
    private $type = 'Unknown';

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255, nullable=false)
     */
    private $message = '';

    /**
     * @var string
     *
     * @ORM\Column(name="playerName", type="string", length=64, nullable=false)
     */
    private $playername = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): EventsAdmin
    {
        $this->id = $id;

        return $this;
    }

    public function getEventtime(): \DateTime
    {
        return $this->eventtime;
    }

    public function setEventtime(\DateTime $eventtime): EventsAdmin
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
     * @return EventsAdmin
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

    public function setMap(string $map): EventsAdmin
    {
        $this->map = $map;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): EventsAdmin
    {
        $this->type = $type;

        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): EventsAdmin
    {
        $this->message = $message;

        return $this;
    }

    public function getPlayername(): string
    {
        return $this->playername;
    }

    public function setPlayername(string $playername): EventsAdmin
    {
        $this->playername = $playername;

        return $this;
    }
}
