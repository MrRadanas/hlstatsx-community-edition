<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsChatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsEventsChat.
 *
 * @ORM\Table(name="hlstats_Events_Chat", indexes={@ORM\Index(name="playerId", columns={"playerId"}), @ORM\Index(name="serverId", columns={"serverId"}), @ORM\Index(name="message", columns={"message"})})
 *
 * @ORM\Entity(repositoryClass=EventsChatRepository::class)
 */
class EventsChat
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
     * @var bool
     *
     * @ORM\Column(name="message_mode", type="boolean", nullable=false)
     */
    private $messageMode = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=128, nullable=false)
     */
    private $message = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): EventsChat
    {
        $this->id = $id;

        return $this;
    }

    public function getEventtime(): \DateTime
    {
        return $this->eventtime;
    }

    public function setEventtime(\DateTime $eventtime): EventsChat
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
     * @return EventsChat
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

    public function setMap(string $map): EventsChat
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
     * @return EventsChat
     */
    public function setPlayerid($playerid)
    {
        $this->playerid = $playerid;

        return $this;
    }

    /**
     * @return bool|string
     */
    public function getMessageMode()
    {
        return $this->messageMode;
    }

    /**
     * @param bool|string $messageMode
     *
     * @return EventsChat
     */
    public function setMessageMode($messageMode)
    {
        $this->messageMode = $messageMode;

        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): EventsChat
    {
        $this->message = $message;

        return $this;
    }
}
