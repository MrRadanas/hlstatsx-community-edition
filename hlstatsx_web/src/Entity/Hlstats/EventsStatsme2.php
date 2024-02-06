<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsStatsme2Repository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @todo $serverid скорее всего ведет на Servers
 */
#[ORM\Table(name: 'hlstats_Events_Statsme2')]
#[ORM\Index(name: 'playerId', columns: ['playerId'])]
#[ORM\Index(name: 'weapon', columns: ['weapon'])]
#[ORM\Entity(repositoryClass: EventsStatsme2Repository::class)]
class EventsStatsme2
{
    #[ORM\Column(name: 'id', type: 'integer', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[ORM\Column(name: 'eventTime', type: 'datetime', nullable: true)]
    private ?\DateTime $eventtime;

    #[ORM\Column(name: 'serverId', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $serverid = 0;

    #[ORM\Column(name: 'map', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $map = '';

    #[ORM\Column(name: 'playerId', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $playerid = 0;

    #[ORM\Column(name: 'weapon', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $weapon = '';

    #[ORM\Column(name: 'head', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $head = 0;

    #[ORM\Column(name: 'chest', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $chest = 0;

    #[ORM\Column(name: 'stomach', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $stomach = 0;

    #[ORM\Column(name: 'leftarm', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $leftarm = 0;

    #[ORM\Column(name: 'rightarm', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $rightarm = 0;

    #[ORM\Column(name: 'leftleg', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $leftleg = 0;

    #[ORM\Column(name: 'rightleg', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $rightleg = 0;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getEventtime(): ?\DateTime
    {
        return $this->eventtime;
    }

    public function setEventtime(?\DateTime $eventtime): static
    {
        $this->eventtime = $eventtime;

        return $this;
    }

    public function getServerid(): int
    {
        return $this->serverid;
    }

    public function setServerid(int $serverid): static
    {
        $this->serverid = $serverid;

        return $this;
    }

    public function getMap(): string
    {
        return $this->map;
    }

    public function setMap(string $map): static
    {
        $this->map = $map;

        return $this;
    }

    public function getPlayerid(): int
    {
        return $this->playerid;
    }

    public function setPlayerid(int $playerid): static
    {
        $this->playerid = $playerid;

        return $this;
    }

    public function getWeapon(): string
    {
        return $this->weapon;
    }

    public function setWeapon(string $weapon): static
    {
        $this->weapon = $weapon;

        return $this;
    }

    public function getHead(): int
    {
        return $this->head;
    }

    public function setHead(int $head): static
    {
        $this->head = $head;

        return $this;
    }

    public function getChest(): int
    {
        return $this->chest;
    }

    public function setChest(int $chest): static
    {
        $this->chest = $chest;

        return $this;
    }

    public function getStomach(): int
    {
        return $this->stomach;
    }

    public function setStomach(int $stomach): static
    {
        $this->stomach = $stomach;

        return $this;
    }

    public function getLeftarm(): int
    {
        return $this->leftarm;
    }

    public function setLeftarm(int $leftarm): static
    {
        $this->leftarm = $leftarm;

        return $this;
    }

    public function getRightarm(): int
    {
        return $this->rightarm;
    }

    public function setRightarm(int $rightarm): static
    {
        $this->rightarm = $rightarm;

        return $this;
    }

    public function getLeftleg(): int
    {
        return $this->leftleg;
    }

    public function setLeftleg(int $leftleg): static
    {
        $this->leftleg = $leftleg;

        return $this;
    }

    public function getRightleg(): int
    {
        return $this->rightleg;
    }

    public function setRightleg(int $rightleg): static
    {
        $this->rightleg = $rightleg;

        return $this;
    }
}
