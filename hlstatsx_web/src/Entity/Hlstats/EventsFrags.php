<?php

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsFragsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsEventsFrags.
 *
 * @ORM\Table(name="hlstats_Events_Frags", indexes={@ORM\Index(name="killerId", columns={"killerId"}), @ORM\Index(name="victimId", columns={"victimId"}), @ORM\Index(name="serverId", columns={"serverId"}), @ORM\Index(name="headshot", columns={"headshot"}), @ORM\Index(name="map", columns={"map"}), @ORM\Index(name="weapon16", columns={"weapon"}), @ORM\Index(name="killerRole", columns={"killerRole"})})
 *
 * @ORM\Entity(repositoryClass=EventsFragsRepository::class)
 */
class EventsFrags
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
     * @ORM\Column(name="killerId", type="integer", nullable=false, options={"unsigned": true})
     */
    private $killerid = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="victimId", type="integer", nullable=false, options={"unsigned": true})
     */
    private $victimid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="weapon", type="string", length=64, nullable=false)
     */
    private $weapon = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="headshot", type="boolean", nullable=false)
     */
    private $headshot = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="killerRole", type="string", length=64, nullable=false)
     */
    private $killerrole = '';

    /**
     * @var string
     *
     * @ORM\Column(name="victimRole", type="string", length=64, nullable=false)
     */
    private $victimrole = '';

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

    /**
     * @var int|null
     *
     * @ORM\Column(name="pos_victim_x", type="integer", nullable=true)
     */
    private $posVictimX;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pos_victim_y", type="integer", nullable=true)
     */
    private $posVictimY;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pos_victim_z", type="integer", nullable=true)
     */
    private $posVictimZ;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): EventsFrags
    {
        $this->id = $id;

        return $this;
    }

    public function getEventtime(): \DateTime
    {
        return $this->eventtime;
    }

    public function setEventtime(\DateTime $eventtime): EventsFrags
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
     * @return EventsFrags
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

    public function setMap(string $map): EventsFrags
    {
        $this->map = $map;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getKillerid()
    {
        return $this->killerid;
    }

    /**
     * @param int|string $killerid
     *
     * @return EventsFrags
     */
    public function setKillerid($killerid)
    {
        $this->killerid = $killerid;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getVictimid()
    {
        return $this->victimid;
    }

    /**
     * @param int|string $victimid
     *
     * @return EventsFrags
     */
    public function setVictimid($victimid)
    {
        $this->victimid = $victimid;

        return $this;
    }

    public function getWeapon(): string
    {
        return $this->weapon;
    }

    public function setWeapon(string $weapon): EventsFrags
    {
        $this->weapon = $weapon;

        return $this;
    }

    /**
     * @return bool|string
     */
    public function getHeadshot()
    {
        return $this->headshot;
    }

    /**
     * @param bool|string $headshot
     *
     * @return EventsFrags
     */
    public function setHeadshot($headshot)
    {
        $this->headshot = $headshot;

        return $this;
    }

    public function getKillerrole(): string
    {
        return $this->killerrole;
    }

    public function setKillerrole(string $killerrole): EventsFrags
    {
        $this->killerrole = $killerrole;

        return $this;
    }

    public function getVictimrole(): string
    {
        return $this->victimrole;
    }

    public function setVictimrole(string $victimrole): EventsFrags
    {
        $this->victimrole = $victimrole;

        return $this;
    }

    public function getPosX(): int
    {
        return $this->posX;
    }

    public function setPosX(int $posX): EventsFrags
    {
        $this->posX = $posX;

        return $this;
    }

    public function getPosY(): int
    {
        return $this->posY;
    }

    public function setPosY(int $posY): EventsFrags
    {
        $this->posY = $posY;

        return $this;
    }

    public function getPosZ(): int
    {
        return $this->posZ;
    }

    public function setPosZ(int $posZ): EventsFrags
    {
        $this->posZ = $posZ;

        return $this;
    }

    public function getPosVictimX(): int
    {
        return $this->posVictimX;
    }

    public function setPosVictimX(int $posVictimX): EventsFrags
    {
        $this->posVictimX = $posVictimX;

        return $this;
    }

    public function getPosVictimY(): int
    {
        return $this->posVictimY;
    }

    public function setPosVictimY(int $posVictimY): EventsFrags
    {
        $this->posVictimY = $posVictimY;

        return $this;
    }

    public function getPosVictimZ(): int
    {
        return $this->posVictimZ;
    }

    public function setPosVictimZ(int $posVictimZ): EventsFrags
    {
        $this->posVictimZ = $posVictimZ;

        return $this;
    }
}
