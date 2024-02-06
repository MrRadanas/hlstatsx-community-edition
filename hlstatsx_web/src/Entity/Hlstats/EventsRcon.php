<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsRconRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @todo $serverid скорее всего ведет на Servers
 */
#[ORM\Table(name: 'hlstats_Events_Rcon')]
#[ORM\Entity(repositoryClass: EventsRconRepository::class)]
class EventsRcon
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

    #[ORM\Column(name: 'type', type: 'string', length: 6, nullable: false, options: ['default' => 'UNK'])]
    private string $type = 'UNK';

    #[ORM\Column(name: 'remoteIp', type: 'string', length: 32, nullable: false, options: ['default' => ''])]
    private string $remoteip = '';

    #[ORM\Column(name: 'password', type: 'string', length: 128, nullable: false, options: ['default' => ''])]
    private string $password = '';

    #[ORM\Column(name: 'command', type: 'string', length: 255, nullable: false, options: ['default' => ''])]
    private string $command = '';

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

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getRemoteip(): string
    {
        return $this->remoteip;
    }

    public function setRemoteip(string $remoteip): static
    {
        $this->remoteip = $remoteip;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getCommand(): string
    {
        return $this->command;
    }

    public function setCommand(string $command): static
    {
        $this->command = $command;

        return $this;
    }
}
