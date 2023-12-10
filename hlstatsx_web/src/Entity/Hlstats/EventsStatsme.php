<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsStatsmeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @todo $serverid скорее всего ведет на Servers
 */
#[ORM\Table(name: 'hlstats_Events_Statsme')]
#[ORM\Index(name: 'playerId', columns: ['playerId'])]
#[ORM\Index(name: 'weapon', columns: ['weapon'])]
#[ORM\Entity(repositoryClass: EventsStatsmeRepository::class)]
class EventsStatsme
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

    #[ORM\Column(name: 'shots', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $shots = 0;

    #[ORM\Column(name: 'hits', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $hits = 0;

    #[ORM\Column(name: 'headshots', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $headshots = 0;

    #[ORM\Column(name: 'damage', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $damage = 0;

    #[ORM\Column(name: 'kills', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $kills = 0;

    #[ORM\Column(name: 'deaths', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $deaths = 0;

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

    public function getShots(): int
    {
        return $this->shots;
    }

    public function setShots(int $shots): static
    {
        $this->shots = $shots;

        return $this;
    }

    public function getHits(): int
    {
        return $this->hits;
    }

    public function setHits(int $hits): static
    {
        $this->hits = $hits;

        return $this;
    }

    public function getHeadshots(): int
    {
        return $this->headshots;
    }

    public function setHeadshots(int $headshots): static
    {
        $this->headshots = $headshots;

        return $this;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function setDamage(int $damage): static
    {
        $this->damage = $damage;

        return $this;
    }

    public function getKills(): int
    {
        return $this->kills;
    }

    public function setKills(int $kills): static
    {
        $this->kills = $kills;

        return $this;
    }

    public function getDeaths(): int
    {
        return $this->deaths;
    }

    public function setDeaths(int $deaths): static
    {
        $this->deaths = $deaths;

        return $this;
    }
}
