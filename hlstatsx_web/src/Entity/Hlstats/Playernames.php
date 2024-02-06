<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\PlayernamesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'hlstats_PlayerNames')]
#[ORM\Index(name: 'name16', columns: ['name'])]
#[ORM\Entity(repositoryClass: PlayernamesRepository::class)]
class Playernames
{
    #[ORM\Column(name: 'name', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private string $name = '';

    #[ORM\Column(name: 'playerId', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private int $playerid = 0;

    #[ORM\Column(name: 'lastuse', type: 'datetime', nullable: true)]
    private ?\DateTime $lastuse;

    #[ORM\Column(name: 'connection_time', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $connectionTime = 0;

    #[ORM\Column(name: 'numuses', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $numuses = 0;

    #[ORM\Column(name: 'kills', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $kills = 0;

    #[ORM\Column(name: 'deaths', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $deaths = 0;

    #[ORM\Column(name: 'suicides', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $suicides = 0;

    #[ORM\Column(name: 'headshots', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $headshots = 0;

    #[ORM\Column(name: 'shots', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $shots = 0;

    #[ORM\Column(name: 'hits', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $hits = 0;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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

    public function getLastuse(): ?\DateTime
    {
        return $this->lastuse;
    }

    public function setLastuse(?\DateTime $lastuse): static
    {
        $this->lastuse = $lastuse;

        return $this;
    }

    public function getConnectionTime(): int
    {
        return $this->connectionTime;
    }

    public function setConnectionTime(int $connectionTime): static
    {
        $this->connectionTime = $connectionTime;

        return $this;
    }

    public function getNumuses(): int
    {
        return $this->numuses;
    }

    public function setNumuses(int $numuses): static
    {
        $this->numuses = $numuses;

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

    public function getSuicides(): int
    {
        return $this->suicides;
    }

    public function setSuicides(int $suicides): static
    {
        $this->suicides = $suicides;

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
}
