<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\EventsPlayeractionsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * @todo $serverid скорее всего ведет на Servers
 */
#[ORM\Table(name: 'hlstats_Events_PlayerActions')]
#[ORM\Index(name: 'playerId', columns: ['playerId'])]
#[ORM\Index(name: 'actionId', columns: ['actionId'])]
#[ORM\Entity(repositoryClass: EventsPlayeractionsRepository::class)]
class EventsPlayeractions
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'id', type: 'integer', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $id;

    #[ORM\Column(name: 'eventTime', type: 'datetime', nullable: true)]
    private ?DateTime $eventtime;

    #[ORM\Column(name: 'serverId', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $serverid = 0;

    #[ORM\Column(name: 'map', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $map = '';

    #[ORM\Column(name: 'playerId', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $playerid = 0;

    #[ORM\Column(name: 'actionId', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $actionid = 0;

    #[ORM\Column(name: 'bonus', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $bonus = 0;

    #[ORM\Column(name: 'pos_x', type: 'integer', nullable: true)]
    private ?int $posX;

    #[ORM\Column(name: 'pos_y', type: 'integer', nullable: true)]
    private ?int $posY;

    #[ORM\Column(name: 'pos_z', type: 'integer', nullable: true)]
    private ?int $posZ;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getEventtime(): ?DateTime
    {
        return $this->eventtime;
    }

    public function setEventtime(?DateTime $eventtime): static
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

    public function getActionid(): int
    {
        return $this->actionid;
    }

    public function setActionid(int $actionid): static
    {
        $this->actionid = $actionid;

        return $this;
    }

    public function getBonus(): int
    {
        return $this->bonus;
    }

    public function setBonus(int $bonus): static
    {
        $this->bonus = $bonus;

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
}
