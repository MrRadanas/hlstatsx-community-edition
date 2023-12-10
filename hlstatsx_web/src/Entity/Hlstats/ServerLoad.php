<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\ServerLoadRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsServerLoad.
 */
#[ORM\Table(name: 'hlstats_server_load')]
#[ORM\Index(name: 'server_id', columns: ['server_id'])]
#[ORM\Index(name: 'timestamp', columns: ['timestamp'])]
#[ORM\Entity(repositoryClass: ServerLoadRepository::class)]
class ServerLoad
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'server_id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $serverId = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'timestamp', type: 'integer', nullable: false)]
    private $timestamp = '0';

    /**
     * @var bool
     */
    #[ORM\Column(name: 'act_players', type: 'boolean', nullable: false)]
    private $actPlayers = '0';

    /**
     * @var bool
     */
    #[ORM\Column(name: 'min_players', type: 'boolean', nullable: false)]
    private $minPlayers = '0';

    /**
     * @var bool
     */
    #[ORM\Column(name: 'max_players', type: 'boolean', nullable: false)]
    private $maxPlayers = '0';

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'map', type: 'string', length: 64, nullable: true)]
    private $map;

    /**
     * @var string
     */
    #[ORM\Column(name: 'uptime', type: 'string', length: 10, nullable: false)]
    private $uptime = '0';

    /**
     * @var string
     */
    #[ORM\Column(name: 'fps', type: 'string', length: 10, nullable: false)]
    private $fps = '0';

    /**
     * @return int|string
     */
    public function getServerId()
    {
        return $this->serverId;
    }

    /**
     * @param int|string $serverId
     *
     * @return ServerLoad
     */
    public function setServerId($serverId)
    {
        $this->serverId = $serverId;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param int|string $timestamp
     *
     * @return ServerLoad
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * @return bool|string
     */
    public function getActPlayers()
    {
        return $this->actPlayers;
    }

    /**
     * @param bool|string $actPlayers
     *
     * @return ServerLoad
     */
    public function setActPlayers($actPlayers)
    {
        $this->actPlayers = $actPlayers;

        return $this;
    }

    /**
     * @return bool|string
     */
    public function getMinPlayers()
    {
        return $this->minPlayers;
    }

    /**
     * @param bool|string $minPlayers
     *
     * @return ServerLoad
     */
    public function setMinPlayers($minPlayers)
    {
        $this->minPlayers = $minPlayers;

        return $this;
    }

    /**
     * @return bool|string
     */
    public function getMaxPlayers()
    {
        return $this->maxPlayers;
    }

    /**
     * @param bool|string $maxPlayers
     *
     * @return ServerLoad
     */
    public function setMaxPlayers($maxPlayers)
    {
        $this->maxPlayers = $maxPlayers;

        return $this;
    }

    public function getMap(): string
    {
        return $this->map;
    }

    public function setMap(string $map): ServerLoad
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
