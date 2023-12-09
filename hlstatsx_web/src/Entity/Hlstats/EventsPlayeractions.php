<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsPlayeractionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsEventsPlayeractions.
 *
 * @ORM\Table(name="hlstats_Events_PlayerActions", indexes={@ORM\Index(name="playerId", columns={"playerId"}), @ORM\Index(name="actionId", columns={"actionId"})})
 *
 * @ORM\Entity(repositoryClass=EventsPlayeractionsRepository::class)
 */
class EventsPlayeractions
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
     * @var int
     *
     * @ORM\Column(name="actionId", type="integer", nullable=false, options={"unsigned": true})
     */
    private $actionid = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="bonus", type="integer", nullable=false)
     */
    private $bonus = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="pos_x", type="integer", nullable=true)
     */
    private $posX;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pos_y", type="integer", nullable=true)
     */
    private $posY;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pos_z", type="integer", nullable=true)
     */
    private $posZ;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): EventsPlayeractions
    {
        $this->id = $id;

        return $this;
    }

    public function getEventtime(): \DateTime
    {
        return $this->eventtime;
    }

    public function setEventtime(\DateTime $eventtime): EventsPlayeractions
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
     * @return EventsPlayeractions
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

    public function setMap(string $map): EventsPlayeractions
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
     * @return EventsPlayeractions
     */
    public function setPlayerid($playerid)
    {
        $this->playerid = $playerid;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getActionid()
    {
        return $this->actionid;
    }

    /**
     * @param int|string $actionid
     *
     * @return EventsPlayeractions
     */
    public function setActionid($actionid)
    {
        $this->actionid = $actionid;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getBonus()
    {
        return $this->bonus;
    }

    /**
     * @param int|string $bonus
     *
     * @return EventsPlayeractions
     */
    public function setBonus($bonus)
    {
        $this->bonus = $bonus;

        return $this;
    }

    public function getPosX(): int
    {
        return $this->posX;
    }

    public function setPosX(int $posX): EventsPlayeractions
    {
        $this->posX = $posX;

        return $this;
    }

    public function getPosY(): int
    {
        return $this->posY;
    }

    public function setPosY(int $posY): EventsPlayeractions
    {
        $this->posY = $posY;

        return $this;
    }

    public function getPosZ(): int
    {
        return $this->posZ;
    }

    public function setPosZ(int $posZ): EventsPlayeractions
    {
        $this->posZ = $posZ;

        return $this;
    }
}
