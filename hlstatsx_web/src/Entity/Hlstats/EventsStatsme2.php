<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsStatsme2Repository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsEventsStatsme2.
 *
 * @ORM\Table(name="hlstats_Events_Statsme2", indexes={@ORM\Index(name="playerId", columns={"playerId"}), @ORM\Index(name="weapon", columns={"weapon"})})
 *
 * @ORM\Entity(repositoryClass=EventsStatsme2Repository::class)
 */
class EventsStatsme2
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
     * @var int
     *
     * @ORM\Column(name="head", type="integer", nullable=false, options={"unsigned": true})
     */
    private $head = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="chest", type="integer", nullable=false, options={"unsigned": true})
     */
    private $chest = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="stomach", type="integer", nullable=false, options={"unsigned": true})
     */
    private $stomach = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="leftarm", type="integer", nullable=false, options={"unsigned": true})
     */
    private $leftarm = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="rightarm", type="integer", nullable=false, options={"unsigned": true})
     */
    private $rightarm = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="leftleg", type="integer", nullable=false, options={"unsigned": true})
     */
    private $leftleg = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="rightleg", type="integer", nullable=false, options={"unsigned": true})
     */
    private $rightleg = '0';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): EventsStatsme2
    {
        $this->id = $id;

        return $this;
    }

    public function getEventtime(): \DateTime
    {
        return $this->eventtime;
    }

    public function setEventtime(\DateTime $eventtime): EventsStatsme2
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
     * @return EventsStatsme2
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

    public function setMap(string $map): EventsStatsme2
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
     * @return EventsStatsme2
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

    public function setWeapon(string $weapon): EventsStatsme2
    {
        $this->weapon = $weapon;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param int|string $head
     *
     * @return EventsStatsme2
     */
    public function setHead($head)
    {
        $this->head = $head;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getChest()
    {
        return $this->chest;
    }

    /**
     * @param int|string $chest
     *
     * @return EventsStatsme2
     */
    public function setChest($chest)
    {
        $this->chest = $chest;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getStomach()
    {
        return $this->stomach;
    }

    /**
     * @param int|string $stomach
     *
     * @return EventsStatsme2
     */
    public function setStomach($stomach)
    {
        $this->stomach = $stomach;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getLeftarm()
    {
        return $this->leftarm;
    }

    /**
     * @param int|string $leftarm
     *
     * @return EventsStatsme2
     */
    public function setLeftarm($leftarm)
    {
        $this->leftarm = $leftarm;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getRightarm()
    {
        return $this->rightarm;
    }

    /**
     * @param int|string $rightarm
     *
     * @return EventsStatsme2
     */
    public function setRightarm($rightarm)
    {
        $this->rightarm = $rightarm;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getLeftleg()
    {
        return $this->leftleg;
    }

    /**
     * @param int|string $leftleg
     *
     * @return EventsStatsme2
     */
    public function setLeftleg($leftleg)
    {
        $this->leftleg = $leftleg;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getRightleg()
    {
        return $this->rightleg;
    }

    /**
     * @param int|string $rightleg
     *
     * @return EventsStatsme2
     */
    public function setRightleg($rightleg)
    {
        $this->rightleg = $rightleg;

        return $this;
    }
}
