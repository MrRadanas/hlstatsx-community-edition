<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsLivestats.
 *
 * @ORM\Table(name="hlstats_Livestats")
 *
 * @ORM\Entity
 */
class Livestats
{
    /**
     * @var int
     *
     * @ORM\Column(name="player_id", type="integer", nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $playerId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="server_id", type="integer", nullable=false)
     */
    private $serverId = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="cli_address", type="string", length=32, nullable=false)
     */
    private $cliAddress = '';

    /**
     * @var string
     *
     * @ORM\Column(name="cli_city", type="string", length=64, nullable=false)
     */
    private $cliCity = '';

    /**
     * @var string
     *
     * @ORM\Column(name="cli_country", type="string", length=64, nullable=false)
     */
    private $cliCountry = '';

    /**
     * @var string
     *
     * @ORM\Column(name="cli_flag", type="string", length=16, nullable=false)
     */
    private $cliFlag = '';

    /**
     * @var string
     *
     * @ORM\Column(name="cli_state", type="string", length=64, nullable=false)
     */
    private $cliState = '';

    /**
     * @var float|null
     *
     * @ORM\Column(name="cli_lat", type="float", precision=7, scale=4, nullable=true)
     */
    private $cliLat;

    /**
     * @var float|null
     *
     * @ORM\Column(name="cli_lng", type="float", precision=7, scale=4, nullable=true)
     */
    private $cliLng;

    /**
     * @var string
     *
     * @ORM\Column(name="steam_id", type="string", length=64, nullable=false)
     */
    private $steamId = '';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="team", type="string", length=64, nullable=false)
     */
    private $team = '';

    /**
     * @var int
     *
     * @ORM\Column(name="kills", type="integer", nullable=false)
     */
    private $kills = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="deaths", type="integer", nullable=false)
     */
    private $deaths = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="suicides", type="integer", nullable=false)
     */
    private $suicides = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="headshots", type="integer", nullable=false)
     */
    private $headshots = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="shots", type="integer", nullable=false)
     */
    private $shots = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="hits", type="integer", nullable=false)
     */
    private $hits = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_dead", type="boolean", nullable=false)
     */
    private $isDead = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="has_bomb", type="integer", nullable=false)
     */
    private $hasBomb = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="ping", type="integer", nullable=false)
     */
    private $ping = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="connected", type="integer", nullable=false)
     */
    private $connected = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill_change", type="integer", nullable=false)
     */
    private $skillChange = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="skill", type="integer", nullable=false)
     */
    private $skill = '0';

    /**
     * @return int|string
     */
    public function getPlayerId()
    {
        return $this->playerId;
    }

    /**
     * @param int|string $playerId
     *
     * @return Livestats
     */
    public function setPlayerId($playerId)
    {
        $this->playerId = $playerId;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getServerId()
    {
        return $this->serverId;
    }

    /**
     * @param int|string $serverId
     *
     * @return Livestats
     */
    public function setServerId($serverId)
    {
        $this->serverId = $serverId;

        return $this;
    }

    public function getCliAddress(): string
    {
        return $this->cliAddress;
    }

    public function setCliAddress(string $cliAddress): Livestats
    {
        $this->cliAddress = $cliAddress;

        return $this;
    }

    public function getCliCity(): string
    {
        return $this->cliCity;
    }

    public function setCliCity(string $cliCity): Livestats
    {
        $this->cliCity = $cliCity;

        return $this;
    }

    public function getCliCountry(): string
    {
        return $this->cliCountry;
    }

    public function setCliCountry(string $cliCountry): Livestats
    {
        $this->cliCountry = $cliCountry;

        return $this;
    }

    public function getCliFlag(): string
    {
        return $this->cliFlag;
    }

    public function setCliFlag(string $cliFlag): Livestats
    {
        $this->cliFlag = $cliFlag;

        return $this;
    }

    public function getCliState(): string
    {
        return $this->cliState;
    }

    public function setCliState(string $cliState): Livestats
    {
        $this->cliState = $cliState;

        return $this;
    }

    public function getCliLat(): float
    {
        return $this->cliLat;
    }

    public function setCliLat(float $cliLat): Livestats
    {
        $this->cliLat = $cliLat;

        return $this;
    }

    public function getCliLng(): float
    {
        return $this->cliLng;
    }

    public function setCliLng(float $cliLng): Livestats
    {
        $this->cliLng = $cliLng;

        return $this;
    }

    public function getSteamId(): string
    {
        return $this->steamId;
    }

    public function setSteamId(string $steamId): Livestats
    {
        $this->steamId = $steamId;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Livestats
    {
        $this->name = $name;

        return $this;
    }

    public function getTeam(): string
    {
        return $this->team;
    }

    public function setTeam(string $team): Livestats
    {
        $this->team = $team;

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
     * @return Livestats
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
     * @return Livestats
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
     * @return Livestats
     */
    public function setSuicides($suicides)
    {
        $this->suicides = $suicides;

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
     * @return Livestats
     */
    public function setHeadshots($headshots)
    {
        $this->headshots = $headshots;

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
     * @return Livestats
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
     * @return Livestats
     */
    public function setHits($hits)
    {
        $this->hits = $hits;

        return $this;
    }

    /**
     * @return bool|string
     */
    public function getIsDead()
    {
        return $this->isDead;
    }

    /**
     * @param bool|string $isDead
     *
     * @return Livestats
     */
    public function setIsDead($isDead)
    {
        $this->isDead = $isDead;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getHasBomb()
    {
        return $this->hasBomb;
    }

    /**
     * @param int|string $hasBomb
     *
     * @return Livestats
     */
    public function setHasBomb($hasBomb)
    {
        $this->hasBomb = $hasBomb;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getPing()
    {
        return $this->ping;
    }

    /**
     * @param int|string $ping
     *
     * @return Livestats
     */
    public function setPing($ping)
    {
        $this->ping = $ping;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getConnected()
    {
        return $this->connected;
    }

    /**
     * @param int|string $connected
     *
     * @return Livestats
     */
    public function setConnected($connected)
    {
        $this->connected = $connected;

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
     * @return Livestats
     */
    public function setSkillChange($skillChange)
    {
        $this->skillChange = $skillChange;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * @param int|string $skill
     *
     * @return Livestats
     */
    public function setSkill($skill)
    {
        $this->skill = $skill;

        return $this;
    }
}
