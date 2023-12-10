<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\PlayersAwardsRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Table(name: 'hlstats_Players_Awards')]
#[ORM\Entity(repositoryClass: PlayersAwardsRepository::class)]
class PlayersAwards
{
    #[ManyToOne(targetEntity: Games::class)]
    #[JoinColumn(name: 'game', referencedColumnName: 'code', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private Games $game;

    #[ORM\Column(name: 'awardTime', type: 'date', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private \DateTime $awardtime;

    #[ORM\Column(name: 'awardId', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private int $awardid = 0;

    #[ORM\Column(name: 'playerId', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private int $playerid = 0;

    #[ORM\Column(name: 'count', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $count = 0;

    public function getGame(): Games
    {
        return $this->game;
    }

    public function setGame(Games $game): PlayersAwards
    {
        $this->game = $game;

        return $this;
    }

    public function getAwardtime(): \DateTime
    {
        return $this->awardtime;
    }

    public function setAwardtime(\DateTime $awardtime): PlayersAwards
    {
        $this->awardtime = $awardtime;

        return $this;
    }

    public function getAwardid(): int
    {
        return $this->awardid;
    }

    public function setAwardid(int $awardid): PlayersAwards
    {
        $this->awardid = $awardid;

        return $this;
    }

    public function getPlayerid(): int
    {
        return $this->playerid;
    }

    public function setPlayerid(int $playerid): PlayersAwards
    {
        $this->playerid = $playerid;

        return $this;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function setCount(int $count): PlayersAwards
    {
        $this->count = $count;

        return $this;
    }
}
