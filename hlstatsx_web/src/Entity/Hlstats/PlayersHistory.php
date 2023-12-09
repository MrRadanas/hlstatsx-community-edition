<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\PlayersHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsPlayersHistory.
 *
 * @ORM\Table(name="hlstats_Players_History", uniqueConstraints={@ORM\UniqueConstraint(name="eventTime", columns={"eventTime", "playerId", "game"})}, indexes={@ORM\Index(name="playerId", columns={"playerId"})})
 *
 * @ORM\Entity(repositoryClass=PlayersHistoryRepository::class)
 */
class PlayersHistory
{
    /**
     * @var int
     *
     * @ORM\Column(name="playerId", type="integer", nullable=false, options={"unsigned": true})
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $playerid = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="eventTime", type="date", nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $eventtime;

    /**
     * @var int
     *
     * @ORM\Column(name="connection_time", type="integer", nullable=false, options={"unsigned": true})
     */
    private $connectionTime = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="kills", type="integer", nullable=false, options={"unsigned": true})
     */
    private $kills = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="deaths", type="integer", nullable=false, options={"unsigned": true})
     */
    private $deaths = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="suicides", type="integer", nullable=false, options={"unsigned": true})
     */
    private $suicides = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill", type="integer", nullable=false, options={"default": "1000", "unsigned": true})
     */
    private $skill = 1000;

    /**
     * @var int
     *
     * @ORM\Column(name="shots", type="integer", nullable=false, options={"unsigned": true})
     */
    private $shots = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="hits", type="integer", nullable=false, options={"unsigned": true})
     */
    private $hits = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="game", type="string", length=32, nullable=false)
     */
    private $game = '';

    /**
     * @var int
     *
     * @ORM\Column(name="headshots", type="integer", nullable=false, options={"unsigned": true})
     */
    private $headshots = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="teamkills", type="integer", nullable=false, options={"unsigned": true})
     */
    private $teamkills = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="kill_streak", type="integer", nullable=false)
     */
    private $killStreak = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="death_streak", type="integer", nullable=false)
     */
    private $deathStreak = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_change", type="integer", nullable=false)
     */
    private $skillChange = '0';

    /**
     * @return int|string
     */
    public function getPlayerid()
    {
        return $this->playerid;
    }

    /**
     * @param int|string $playerid
     *
     * @return PlayersHistory
     */
    public function setPlayerid($playerid)
    {
        $this->playerid = $playerid;

        return $this;
    }

    public function getEventtime(): \DateTime
    {
        return $this->eventtime;
    }

    public function setEventtime(\DateTime $eventtime): PlayersHistory
    {
        $this->eventtime = $eventtime;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getConnectionTime()
    {
        return $this->connectionTime;
    }

    /**
     * @param int|string $connectionTime
     *
     * @return PlayersHistory
     */
    public function setConnectionTime($connectionTime)
    {
        $this->connectionTime = $connectionTime;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getKills()
    {
        return $this->kills;
    }

    /**
     * @param int|string $kills
     *
     * @return PlayersHistory
     */
    public function setKills($kills)
    {
        $this->kills = $kills;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getDeaths()
    {
        return $this->deaths;
    }

    /**
     * @param int|string $deaths
     *
     * @return PlayersHistory
     */
    public function setDeaths($deaths)
    {
        $this->deaths = $deaths;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getSuicides()
    {
        return $this->suicides;
    }

    /**
     * @param int|string $suicides
     *
     * @return PlayersHistory
     */
    public function setSuicides($suicides)
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

    /**
     * @return int|string
     */
    public function getShots()
    {
        return $this->shots;
    }

    /**
     * @param int|string $shots
     *
     * @return PlayersHistory
     */
    public function setShots($shots)
    {
        $this->shots = $shots;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * @param int|string $hits
     *
     * @return PlayersHistory
     */
    public function setHits($hits)
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

    /**
     * @return int|string
     */
    public function getHeadshots()
    {
        return $this->headshots;
    }

    /**
     * @param int|string $headshots
     *
     * @return PlayersHistory
     */
    public function setHeadshots($headshots)
    {
        $this->headshots = $headshots;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getTeamkills()
    {
        return $this->teamkills;
    }

    /**
     * @param int|string $teamkills
     *
     * @return PlayersHistory
     */
    public function setTeamkills($teamkills)
    {
        $this->teamkills = $teamkills;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getKillStreak()
    {
        return $this->killStreak;
    }

    /**
     * @param int|string $killStreak
     *
     * @return PlayersHistory
     */
    public function setKillStreak($killStreak)
    {
        $this->killStreak = $killStreak;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getDeathStreak()
    {
        return $this->deathStreak;
    }

    /**
     * @param int|string $deathStreak
     *
     * @return PlayersHistory
     */
    public function setDeathStreak($deathStreak)
    {
        $this->deathStreak = $deathStreak;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getSkillChange()
    {
        return $this->skillChange;
    }

    /**
     * @param int|string $skillChange
     *
     * @return PlayersHistory
     */
    public function setSkillChange($skillChange)
    {
        $this->skillChange = $skillChange;

        return $this;
    }
}
