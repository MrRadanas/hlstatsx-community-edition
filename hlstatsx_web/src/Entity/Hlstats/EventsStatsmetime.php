<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsStatsmetimeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @todo $serverid скорее всего ведет на Servers
 * @todo time протестить
 */
#[ORM\Table(name: 'hlstats_Events_StatsmeTime')]
#[ORM\Index(name: 'playerId', columns: ['playerId'])]
#[ORM\Entity(repositoryClass: EventsStatsmetimeRepository::class)]
class EventsStatsmetime
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

    #[ORM\Column(name: 'time', type: 'time', nullable: false, options: ['default' => '00:00:00'])]
    private \DateTime $time;

    public function __construct()
    {
        $this->time = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): EventsStatsmetime
    {
        $this->id = $id;

        return $this;
    }

    public function getEventtime(): ?\DateTime
    {
        return $this->eventtime;
    }

    public function setEventtime(?\DateTime $eventtime): EventsStatsmetime
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

    public function getTime(): \DateTime
    {
        return $this->time;
    }

    public function setTime(\DateTime $time): static
    {
        $this->time = $time;

        return $this;
    }
}
