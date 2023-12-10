<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\PlayeruniqueidsRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Table(name: 'hlstats_PlayerUniqueIds')]
#[ORM\Index(name: 'playerId', columns: ['playerId'])]
#[ORM\Entity(repositoryClass: PlayeruniqueidsRepository::class)]
class Playeruniqueids
{
    #[ORM\Column(name: 'uniqueId', type: 'string', length: 64, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private string $uniqueid = '';

    #[ORM\Column(name: 'playerId', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $playerid = 0;

    #[ManyToOne(targetEntity: Games::class)]
    #[JoinColumn(name: 'code', referencedColumnName: 'code', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private Games $game;

    #[ORM\Column(name: 'merge', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private int $merge;

    public function getUniqueid(): string
    {
        return $this->uniqueid;
    }

    public function setUniqueid(string $uniqueid): Playeruniqueids
    {
        $this->uniqueid = $uniqueid;

        return $this;
    }

    public function getPlayerid(): int
    {
        return $this->playerid;
    }

    public function setPlayerid(int $playerid): Playeruniqueids
    {
        $this->playerid = $playerid;

        return $this;
    }

    public function getGame(): Games
    {
        return $this->game;
    }

    public function setGame(Games $game): Playeruniqueids
    {
        $this->game = $game;

        return $this;
    }

    public function getMerge(): int
    {
        return $this->merge;
    }

    public function setMerge(int $merge): Playeruniqueids
    {
        $this->merge = $merge;

        return $this;
    }
}
