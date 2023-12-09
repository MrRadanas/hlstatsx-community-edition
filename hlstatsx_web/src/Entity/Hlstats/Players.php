<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\PlayersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsPlayers.
 *
 * @ORM\Table(name="hlstats_Players", indexes={@ORM\Index(name="playerclan", columns={"clan", "playerId"}), @ORM\Index(name="skill", columns={"skill"}), @ORM\Index(name="game", columns={"game"}), @ORM\Index(name="kills", columns={"kills"}), @ORM\Index(name="hideranking", columns={"hideranking"})})
 *
 * @ORM\Entity(repositoryClass=PlayersRepository::class)
 */
class Players
{
    /**
     * @var int
     *
     * @ORM\Column(name="playerId", type="integer", nullable=false, options={"unsigned": true})
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $playerid;

    /**
     * @var int
     *
     * @ORM\Column(name="last_event", type="integer", nullable=false)
     */
    private $lastEvent = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="connection_time", type="integer", nullable=false, options={"unsigned": true})
     */
    private $connectionTime = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=64, nullable=false)
     */
    private $lastname = '';

    /**
     * @var string
     *
     * @ORM\Column(name="lastAddress", type="string", length=32, nullable=false)
     */
    private $lastaddress = '';

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=64, nullable=false)
     */
    private $city = '';

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=64, nullable=false)
     */
    private $state = '';

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=64, nullable=false)
     */
    private $country = '';

    /**
     * @var string
     *
     * @ORM\Column(name="flag", type="string", length=16, nullable=false)
     */
    private $flag = '';

    /**
     * @var float|null
     *
     * @ORM\Column(name="lat", type="float", precision=7, scale=4, nullable=true)
     */
    private $lat;

    /**
     * @var float|null
     *
     * @ORM\Column(name="lng", type="float", precision=7, scale=4, nullable=true)
     */
    private $lng;

    /**
     * @var int
     *
     * @ORM\Column(name="clan", type="integer", nullable=false, options={"unsigned": true})
     */
    private $clan = '0';

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
     * @var int
     *
     * @ORM\Column(name="teamkills", type="integer", nullable=false, options={"unsigned": true})
     */
    private $teamkills = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="fullName", type="string", length=128, nullable=true)
     */
    private $fullname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=64, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="homepage", type="string", length=64, nullable=true)
     */
    private $homepage;

    /**
     * @var int|null
     *
     * @ORM\Column(name="icq", type="integer", nullable=true, options={"unsigned": true})
     */
    private $icq;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="mmrank", type="boolean", nullable=true)
     */
    private $mmrank;

    /**
     * @var string
     *
     * @ORM\Column(name="game", type="string", length=32, nullable=false)
     */
    private $game;

    /**
     * @var int
     *
     * @ORM\Column(name="hideranking", type="integer", nullable=false, options={"unsigned": true})
     */
    private $hideranking = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="headshots", type="integer", nullable=false, options={"unsigned": true})
     */
    private $headshots = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="last_skill_change", type="integer", nullable=false)
     */
    private $lastSkillChange = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="displayEvents", type="integer", nullable=false, options={"default": "1", "unsigned": true})
     */
    private $displayevents = 1;

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
     * @ORM\Column(name="blockavatar", type="integer", nullable=false, options={"unsigned": true})
     */
    private $blockavatar = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="activity", type="integer", nullable=false, options={"default": "100"})
     */
    private $activity = 100;

    /**
     * @var int
     *
     * @ORM\Column(name="createdate", type="integer", nullable=false)
     */
    private $createdate = '0';

    public function getPlayerid(): int
    {
        return $this->playerid;
    }

    public function setPlayerid(int $playerid): Players
    {
        $this->playerid = $playerid;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getLastEvent()
    {
        return $this->lastEvent;
    }

    /**
     * @param int|string $lastEvent
     *
     * @return Players
     */
    public function setLastEvent($lastEvent)
    {
        $this->lastEvent = $lastEvent;

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
     * @return Players
     */
    public function setConnectionTime($connectionTime)
    {
        $this->connectionTime = $connectionTime;

        return $this;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): Players
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getLastaddress(): string
    {
        return $this->lastaddress;
    }

    public function setLastaddress(string $lastaddress): Players
    {
        $this->lastaddress = $lastaddress;

        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): Players
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): Players
    {
        $this->state = $state;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): Players
    {
        $this->country = $country;

        return $this;
    }

    public function getFlag(): string
    {
        return $this->flag;
    }

    public function setFlag(string $flag): Players
    {
        $this->flag = $flag;

        return $this;
    }

    public function getLat(): float
    {
        return $this->lat;
    }

    public function setLat(float $lat): Players
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): float
    {
        return $this->lng;
    }

    public function setLng(float $lng): Players
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getClan()
    {
        return $this->clan;
    }

    /**
     * @param int|string $clan
     *
     * @return Players
     */
    public function setClan($clan)
    {
        $this->clan = $clan;

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
     * @return Players
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
     * @return Players
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
     * @return Players
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

    public function setSkill(int $skill): Players
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
     * @return Players
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
     * @return Players
     */
    public function setHits($hits)
    {
        $this->hits = $hits;

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
     * @return Players
     */
    public function setTeamkills($teamkills)
    {
        $this->teamkills = $teamkills;

        return $this;
    }

    public function getFullname(): string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): Players
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Players
    {
        $this->email = $email;

        return $this;
    }

    public function getHomepage(): string
    {
        return $this->homepage;
    }

    public function setHomepage(string $homepage): Players
    {
        $this->homepage = $homepage;

        return $this;
    }

    public function getIcq(): int
    {
        return $this->icq;
    }

    public function setIcq(int $icq): Players
    {
        $this->icq = $icq;

        return $this;
    }

    public function getMmrank(): bool
    {
        return $this->mmrank;
    }

    public function setMmrank(bool $mmrank): Players
    {
        $this->mmrank = $mmrank;

        return $this;
    }

    public function getGame(): string
    {
        return $this->game;
    }

    public function setGame(string $game): Players
    {
        $this->game = $game;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getHideranking()
    {
        return $this->hideranking;
    }

    /**
     * @param int|string $hideranking
     *
     * @return Players
     */
    public function setHideranking($hideranking)
    {
        $this->hideranking = $hideranking;

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
     * @return Players
     */
    public function setHeadshots($headshots)
    {
        $this->headshots = $headshots;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getLastSkillChange()
    {
        return $this->lastSkillChange;
    }

    /**
     * @param int|string $lastSkillChange
     *
     * @return Players
     */
    public function setLastSkillChange($lastSkillChange)
    {
        $this->lastSkillChange = $lastSkillChange;

        return $this;
    }

    public function getDisplayevents(): int
    {
        return $this->displayevents;
    }

    public function setDisplayevents(int $displayevents): Players
    {
        $this->displayevents = $displayevents;

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
     * @return Players
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
     * @return Players
     */
    public function setDeathStreak($deathStreak)
    {
        $this->deathStreak = $deathStreak;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getBlockavatar()
    {
        return $this->blockavatar;
    }

    /**
     * @param int|string $blockavatar
     *
     * @return Players
     */
    public function setBlockavatar($blockavatar)
    {
        $this->blockavatar = $blockavatar;

        return $this;
    }

    public function getActivity(): int
    {
        return $this->activity;
    }

    public function setActivity(int $activity): Players
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getCreatedate()
    {
        return $this->createdate;
    }

    /**
     * @param int|string $createdate
     *
     * @return Players
     */
    public function setCreatedate($createdate)
    {
        $this->createdate = $createdate;

        return $this;
    }
}
