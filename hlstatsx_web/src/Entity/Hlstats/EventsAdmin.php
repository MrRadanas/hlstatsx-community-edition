<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsAdminRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @todo $serverid скорее всего ведет на Servers
 */
#[ORM\Table(name: 'hlstats_Events_Admin')]
#[ORM\Entity(repositoryClass: EventsAdminRepository::class)]
class EventsAdmin
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

    #[ORM\Column(name: 'type', type: 'string', length: 64, nullable: false, options: ['default' => 'Unknown'])]
    private string $type = 'Unknown';

    #[ORM\Column(name: 'message', type: 'string', length: 255, nullable: false, options: ['default' => ''])]
    private string $message = '';

    #[ORM\Column(name: 'playerName', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $playername = '';

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

    public function setEventtime(\DateTime $eventtime): static
    {
        $this->eventtime = $eventtime;

        return $this;
    }

    public function getServerid(): ?int
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

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getPlayername(): string
    {
        return $this->playername;
    }

    public function setPlayername(string $playername): static
    {
        $this->playername = $playername;

        return $this;
    }
}
