<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsSuicidesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsEventsSuicides.
 *
 * @ORM\Table(name="hlstats_Events_Suicides", indexes={@ORM\Index(name="playerId", columns={"playerId"})})
 *
 * @ORM\Entity(repositoryClass=EventsSuicidesRepository::class)
 */
class EventsSuicides
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

    public function setId(int $id): EventsSuicides
    {
        $this->id = $id;

        return $this;
    }

    public function getEventtime(): \DateTime
    {
        return $this->eventtime;
    }

    public function setEventtime(\DateTime $eventtime): EventsSuicides
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
     * @return EventsSuicides
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

    public function setMap(string $map): EventsSuicides
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
     * @return EventsSuicides
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

    public function setWeapon(string $weapon): EventsSuicides
    {
        $this->weapon = $weapon;

        return $this;
    }

    public function getPosX(): int
    {
        return $this->posX;
    }

    public function setPosX(int $posX): EventsSuicides
    {
        $this->posX = $posX;

        return $this;
    }

    public function getPosY(): int
    {
        return $this->posY;
    }

    public function setPosY(int $posY): EventsSuicides
    {
        $this->posY = $posY;

        return $this;
    }

    public function getPosZ(): int
    {
        return $this->posZ;
    }

    public function setPosZ(int $posZ): EventsSuicides
    {
        $this->posZ = $posZ;

        return $this;
    }
}
