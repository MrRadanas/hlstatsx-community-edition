<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\ServerLoadRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Table(name: 'hlstats_server_load')]
#[ORM\Index(name: 'server_id', columns: ['server_id'])]
#[ORM\Index(name: 'timestamp', columns: ['timestamp'])]
#[ORM\Entity(repositoryClass: ServerLoadRepository::class)]
class ServerLoad
{
    #[ManyToOne(targetEntity: Servers::class)]
    #[JoinColumn(name: 'server_id', referencedColumnName: 'serverId', nullable: false)]
    #[ORM\Id]
    private int $serverId;

    #[ORM\Column(name: 'timestamp', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $timestamp = 0;

    #[ORM\Column(name: 'act_players', type: 'smallint', nullable: false, options: ['default' => 0])]
    private int $actPlayers = 0;

    #[ORM\Column(name: 'min_players', type: 'smallint', nullable: false, options: ['default' => 0])]
    private int $minPlayers = 0;

    #[ORM\Column(name: 'max_players', type: 'smallint', nullable: false, options: ['default' => 0])]
    private int $maxPlayers = 0;

    #[ORM\Column(name: 'map', type: 'string', length: 64, nullable: true)]
    private ?string $map;

    #[ORM\Column(name: 'uptime', type: 'string', length: 10, nullable: false, options: ['default' => '0'])]
    private string $uptime = '0';

    #[ORM\Column(name: 'fps', type: 'string', length: 10, nullable: false, options: ['default' => '0'])]
    private string $fps = '0';

    public function getServerId(): int
    {
        return $this->serverId;
    }

    public function setServerId(int $serverId): ServerLoad
    {
        $this->serverId = $serverId;

        return $this;
    }

    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function setTimestamp(int $timestamp): ServerLoad
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getActPlayers(): int
    {
        return $this->actPlayers;
    }

    public function setActPlayers(int $actPlayers): ServerLoad
    {
        $this->actPlayers = $actPlayers;

        return $this;
    }

    public function getMinPlayers(): int
    {
        return $this->minPlayers;
    }

    public function setMinPlayers(int $minPlayers): ServerLoad
    {
        $this->minPlayers = $minPlayers;

        return $this;
    }

    public function getMaxPlayers(): int
    {
        return $this->maxPlayers;
    }

    public function setMaxPlayers(int $maxPlayers): ServerLoad
    {
        $this->maxPlayers = $maxPlayers;

        return $this;
    }

    public function getMap(): ?string
    {
        return $this->map;
    }

    public function setMap(?string $map): ServerLoad
    {
        $this->map = $map;

        return $this;
    }

    public function getUptime(): string
    {
        return $this->uptime;
    }

    public function setUptime(string $uptime): ServerLoad
    {
        $this->uptime = $uptime;

        return $this;
    }

    public function getFps(): string
    {
        return $this->fps;
    }

    public function setFps(string $fps): ServerLoad
    {
        $this->fps = $fps;

        return $this;
    }
}
