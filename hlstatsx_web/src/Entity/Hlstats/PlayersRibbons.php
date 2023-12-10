<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\PlayersRibbonsRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Table(name: 'hlstats_Players_Ribbons')]
#[ORM\Entity(repositoryClass: PlayersRibbonsRepository::class)]
class PlayersRibbons
{
    #[ORM\Column(name: 'playerId', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private int $playerid = 0;

    #[ORM\Column(name: 'ribbonId', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private int $ribbonid = 0;

    #[ManyToOne(targetEntity: Games::class)]
    #[JoinColumn(name: 'game', referencedColumnName: 'code', nullable: false)]
    private Games $game;

    public function getPlayerid(): int
    {
        return $this->playerid;
    }

    public function setPlayerid(int $playerid): PlayersRibbons
    {
        $this->playerid = $playerid;

        return $this;
    }

    public function getRibbonid(): int
    {
        return $this->ribbonid;
    }

    public function setRibbonid(int $ribbonid): PlayersRibbons
    {
        $this->ribbonid = $ribbonid;

        return $this;
    }

    public function getGame(): Games
    {
        return $this->game;
    }

    public function setGame(Games $game): PlayersRibbons
    {
        $this->game = $game;

        return $this;
    }
}
