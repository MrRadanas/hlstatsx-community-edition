<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsConnectsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @todo $serverid скорее всего ведет на Servers
 */
#[ORM\Table(name: 'hlstats_Events_Connects')]
#[ORM\Index(name: 'playerId', columns: ['playerId'])]
#[ORM\Entity(repositoryClass: EventsConnectsRepository::class)]
class EventsConnects
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

    #[ORM\Column(name: 'ipAddress', type: 'string', length: 32, nullable: false, options: ['default' => ''])]
    private string $ipaddress = '';

    #[ORM\Column(name: 'hostname', type: 'string', length: 255, nullable: false, options: ['default' => ''])]
    private string $hostname = '';

    #[ORM\Column(name: 'hostgroup', type: 'string', length: 255, nullable: false, options: ['default' => ''])]
    private string $hostgroup = '';

    #[ORM\Column(name: 'eventTime_Disconnect', type: 'datetime', nullable: true)]
    private ?\DateTime $eventtimeDisconnect;

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

    public function getIpaddress(): string
    {
        return $this->ipaddress;
    }

    public function setIpaddress(string $ipaddress): static
    {
        $this->ipaddress = $ipaddress;

        return $this;
    }

    public function getHostname(): string
    {
        return $this->hostname;
    }

    public function setHostname(string $hostname): static
    {
        $this->hostname = $hostname;

        return $this;
    }

    public function getHostgroup(): string
    {
        return $this->hostgroup;
    }

    public function setHostgroup(string $hostgroup): static
    {
        $this->hostgroup = $hostgroup;

        return $this;
    }

    public function getEventtimeDisconnect(): ?\DateTime
    {
        return $this->eventtimeDisconnect;
    }

    public function setEventtimeDisconnect(?\DateTime $eventtimeDisconnect): static
    {
        $this->eventtimeDisconnect = $eventtimeDisconnect;

        return $this;
    }
}
