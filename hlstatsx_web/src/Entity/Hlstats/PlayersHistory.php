<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\PlayersHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'hlstats_Players_History')]
#[ORM\Index(name: 'playerId', columns: ['playerId'])]
#[ORM\UniqueConstraint(name: 'eventTime', columns: ['eventTime', 'playerId', 'game'])]
#[ORM\Entity(repositoryClass: PlayersHistoryRepository::class)]
class PlayersHistory
{
    #[ORM\Column(name: 'playerId', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private int $playerid = 0;

    #[ORM\Column(name: 'eventTime', type: 'date', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private ?\DateTime $eventtime;

    #[ORM\Column(name: 'connection_time', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $connectionTime = 0;

    #[ORM\Column(name: 'kills', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $kills = 0;

    #[ORM\Column(name: 'deaths', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $deaths = 0;

    #[ORM\Column(name: 'suicides', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $suicides = 0;

    #[ORM\Column(name: 'skill', type: 'integer', nullable: false, options: ['default' => 1000, 'unsigned' => true])]
    private int $skill = 1000;

    #[ORM\Column(name: 'shots', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $shots = 0;

    #[ORM\Column(name: 'hits', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $hits = 0;

    #[ORM\Column(name: 'game', type: 'string', length: 32, nullable: false, options: ['unsigned' => true, 'default' => ''])]
    private string $game = '';

    #[ORM\Column(name: 'headshots', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $headshots = 0;

    #[ORM\Column(name: 'teamkills', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $teamkills = 0;

    #[ORM\Column(name: 'kill_streak', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $killStreak = 0;

    #[ORM\Column(name: 'death_streak', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $deathStreak = 0;

    #[ORM\Column(name: 'skill_change', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $skillChange = 0;

    public function getPlayerid(): int
    {
        return $this->playerid;
    }

    public function setPlayerid(int $playerid): PlayersHistory
    {
        $this->playerid = $playerid;

        return $this;
    }

    public function getEventtime(): ?\DateTime
    {
        return $this->eventtime;
    }

    public function setEventtime(?\DateTime $eventtime): PlayersHistory
    {
        $this->eventtime = $eventtime;

        return $this;
    }

    public function getConnectionTime(): int
    {
        return $this->connectionTime;
    }

    public function setConnectionTime(int $connectionTime): PlayersHistory
    {
        $this->connectionTime = $connectionTime;

        return $this;
    }

    public function getKills(): int
    {
        return $this->kills;
    }

    public function setKills(int $kills): PlayersHistory
    {
        $this->kills = $kills;

        return $this;
    }

    public function getDeaths(): int
    {
        return $this->deaths;
    }

    public function setDeaths(int $deaths): PlayersHistory
    {
        $this->deaths = $deaths;

        return $this;
    }

    public function getSuicides(): int
    {
        return $this->suicides;
    }

    public function setSuicides(int $suicides): PlayersHistory
    {
        $this->suicides = $suicides;

        return $this;
    }

    public function getSkill(): int
    {
        return $this->skill;
    }

    public function setSkill(int $skill): PlayersHistory
    {
        $this->skill = $skill;

        return $this;
    }

    public function getShots(): int
    {
        return $this->shots;
    }

    public function setShots(int $shots): PlayersHistory
    {
        $this->shots = $shots;

        return $this;
    }

    public function getHits(): int
    {
        return $this->hits;
    }

    public function setHits(int $hits): PlayersHistory
    {
        $this->hits = $hits;

        return $this;
    }

    public function getGame(): string
    {
        return $this->game;
    }

    public function setGame(string $game): PlayersHistory
    {
        $this->game = $game;

        return $this;
    }

    public function getHeadshots(): int
    {
        return $this->headshots;
    }

    public function setHeadshots(int $headshots): PlayersHistory
    {
        $this->headshots = $headshots;

        return $this;
    }

    public function getTeamkills(): int
    {
        return $this->teamkills;
    }

    public function setTeamkills(int $teamkills): PlayersHistory
    {
        $this->teamkills = $teamkills;

        return $this;
    }

    public function getKillStreak(): int
    {
        return $this->killStreak;
    }

    public function setKillStreak(int $killStreak): PlayersHistory
    {
        $this->killStreak = $killStreak;

        return $this;
    }

    public function getDeathStreak(): int
    {
        return $this->deathStreak;
    }

    public function setDeathStreak(int $deathStreak): PlayersHistory
    {
        $this->deathStreak = $deathStreak;

        return $this;
    }

    public function getSkillChange(): int
    {
        return $this->skillChange;
    }

    public function setSkillChange(int $skillChange): PlayersHistory
    {
        $this->skillChange = $skillChange;

        return $this;
    }
}
