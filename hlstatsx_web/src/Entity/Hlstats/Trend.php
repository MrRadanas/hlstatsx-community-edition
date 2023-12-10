<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\TrendRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Table(name: 'hlstats_Trend')]
#[ORM\Index(name: 'game', columns: ['game'])]
#[ORM\Index(name: 'timestamp', columns: ['timestamp'])]
#[ORM\Entity(repositoryClass: TrendRepository::class)]
class Trend
{
    #[ORM\Column(name: 'timestamp', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private int $timestamp = 0;

    #[ManyToOne(targetEntity: Games::class)]
    #[JoinColumn(name: 'game', referencedColumnName: 'code', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private Games $game;

    #[ORM\Column(name: 'players', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $players = 0;

    #[ORM\Column(name: 'kills', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $kills = 0;

    #[ORM\Column(name: 'headshots', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $headshots = 0;

    #[ManyToOne(targetEntity: Servers::class)]
    #[JoinColumn(name: 'servers', referencedColumnName: 'serverId', nullable: false)]
    private Servers $servers;

    #[ORM\Column(name: 'act_slots', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $actSlots = 0;

    #[ORM\Column(name: 'max_slots', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $maxSlots = 0;

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function setTimestamp(int $timestamp): Trend
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getGame(): Games
    {
        return $this->game;
    }

    public function setGame(Games $game): Trend
    {
        $this->game = $game;

        return $this;
    }

    public function getPlayers(): int
    {
        return $this->players;
    }

    public function setPlayers(int $players): Trend
    {
        $this->players = $players;

        return $this;
    }

    public function getKills(): int
    {
        return $this->kills;
    }

    public function setKills(int $kills): Trend
    {
        $this->kills = $kills;

        return $this;
    }

    public function getHeadshots(): int
    {
        return $this->headshots;
    }

    public function setHeadshots(int $headshots): Trend
    {
        $this->headshots = $headshots;

        return $this;
    }

    public function getServers(): Servers
    {
        return $this->servers;
    }

    public function setServers(Servers $servers): Trend
    {
        $this->servers = $servers;

        return $this;
    }

    public function getActSlots(): int
    {
        return $this->actSlots;
    }

    public function setActSlots(int $actSlots): Trend
    {
        $this->actSlots = $actSlots;

        return $this;
    }

    public function getMaxSlots(): int
    {
        return $this->maxSlots;
    }

    public function setMaxSlots(int $maxSlots): Trend
    {
        $this->maxSlots = $maxSlots;

        return $this;
    }
}
