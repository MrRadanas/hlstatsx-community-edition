<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsTeamkillsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'hlstats_Events_Teamkills')]
#[ORM\Index(name: 'killerId', columns: ['killerId'])]
#[ORM\Entity(repositoryClass: EventsTeamkillsRepository::class)]
class EventsTeamkills
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

    #[ORM\Column(name: 'killerId', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $killerid = 0;

    #[ORM\Column(name: 'victimId', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $victimid = 0;

    #[ORM\Column(name: 'weapon', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $weapon = '';

    #[ORM\Column(name: 'pos_x', type: 'integer', nullable: true)]
    private ?int $posX;

    #[ORM\Column(name: 'pos_y', type: 'integer', nullable: true)]
    private ?int $posY;

    #[ORM\Column(name: 'pos_z', type: 'integer', nullable: true)]
    private ?int $posZ;

    #[ORM\Column(name: 'pos_victim_x', type: 'integer', nullable: true)]
    private ?int $posVictimX;

    #[ORM\Column(name: 'pos_victim_y', type: 'integer', nullable: true)]
    private ?int $posVictimY;

    #[ORM\Column(name: 'pos_victim_z', type: 'integer', nullable: true)]
    private ?int $posVictimZ;

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

    public function getKillerid(): int
    {
        return $this->killerid;
    }

    public function setKillerid(int $killerid): static
    {
        $this->killerid = $killerid;

        return $this;
    }

    public function getVictimid(): int
    {
        return $this->victimid;
    }

    public function setVictimid(int $victimid): static
    {
        $this->victimid = $victimid;

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

    public function getPosX(): ?int
    {
        return $this->posX;
    }

    public function setPosX(?int $posX): static
    {
        $this->posX = $posX;

        return $this;
    }

    public function getPosY(): ?int
    {
        return $this->posY;
    }

    public function setPosY(?int $posY): static
    {
        $this->posY = $posY;

        return $this;
    }

    public function getPosZ(): ?int
    {
        return $this->posZ;
    }

    public function setPosZ(?int $posZ): static
    {
        $this->posZ = $posZ;

        return $this;
    }

    public function getPosVictimX(): ?int
    {
        return $this->posVictimX;
    }

    public function setPosVictimX(?int $posVictimX): static
    {
        $this->posVictimX = $posVictimX;

        return $this;
    }

    public function getPosVictimY(): ?int
    {
        return $this->posVictimY;
    }

    public function setPosVictimY(?int $posVictimY): static
    {
        $this->posVictimY = $posVictimY;

        return $this;
    }

    public function getPosVictimZ(): ?int
    {
        return $this->posVictimZ;
    }

    public function setPosVictimZ(?int $posVictimZ): static
    {
        $this->posVictimZ = $posVictimZ;

        return $this;
    }
}
