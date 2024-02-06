<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\LivestatsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'hlstats_Livestats')]
#[ORM\Entity(repositoryClass: LivestatsRepository::class)]
class Livestats
{
    #[ORM\Column(name: 'player_id', type: 'integer', nullable: false, options: ['default' => 0])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private int $playerId = 0;

    #[ORM\Column(name: 'server_id', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $serverId = 0;

    #[ORM\Column(name: 'cli_address', type: 'string', length: 32, nullable: false, options: ['default' => ''])]
    private string $cliAddress = '';

    #[ORM\Column(name: 'cli_city', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $cliCity = '';

    #[ORM\Column(name: 'cli_country', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $cliCountry = '';

    #[ORM\Column(name: 'cli_flag', type: 'string', length: 16, nullable: false, options: ['default' => ''])]
    private string $cliFlag = '';

    #[ORM\Column(name: 'cli_state', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $cliState = '';

    #[ORM\Column(name: 'cli_lat', type: 'float', precision: 7, scale: 4, nullable: true)]
    private ?float $cliLat;

    #[ORM\Column(name: 'cli_lng', type: 'float', precision: 7, scale: 4, nullable: true)]
    private ?float $cliLng;

    #[ORM\Column(name: 'steam_id', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $steamId = '';

    #[ORM\Column(name: 'name', type: 'string', length: 64, nullable: false)]
    private string $name;

    #[ORM\Column(name: 'team', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $team = '';

    #[ORM\Column(name: 'kills', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $kills = 0;

    #[ORM\Column(name: 'deaths', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $deaths = 0;

    #[ORM\Column(name: 'suicides', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $suicides = 0;

    #[ORM\Column(name: 'headshots', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $headshots = 0;

    #[ORM\Column(name: 'shots', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $shots = 0;

    #[ORM\Column(name: 'hits', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $hits = 0;

    #[ORM\Column(name: 'is_dead', type: 'boolean', nullable: false, options: ['default' => false])]
    private bool $isDead = false;

    #[ORM\Column(name: 'has_bomb', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $hasBomb = 0;

    #[ORM\Column(name: 'ping', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $ping = 0;

    #[ORM\Column(name: 'connected', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $connected = 0;

    #[ORM\Column(name: 'skill_change', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $skillChange = 0;

    #[ORM\Column(name: 'skill', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $skill = 0;

    public function getPlayerId(): int
    {
        return $this->playerId;
    }

    public function setPlayerId(int $playerId): static
    {
        $this->playerId = $playerId;

        return $this;
    }

    public function getServerId(): int
    {
        return $this->serverId;
    }

    public function setServerId(int $serverId): static
    {
        $this->serverId = $serverId;

        return $this;
    }

    public function getCliAddress(): string
    {
        return $this->cliAddress;
    }

    public function setCliAddress(string $cliAddress): static
    {
        $this->cliAddress = $cliAddress;

        return $this;
    }

    public function getCliCity(): string
    {
        return $this->cliCity;
    }

    public function setCliCity(string $cliCity): static
    {
        $this->cliCity = $cliCity;

        return $this;
    }

    public function getCliCountry(): string
    {
        return $this->cliCountry;
    }

    public function setCliCountry(string $cliCountry): static
    {
        $this->cliCountry = $cliCountry;

        return $this;
    }

    public function getCliFlag(): string
    {
        return $this->cliFlag;
    }

    public function setCliFlag(string $cliFlag): static
    {
        $this->cliFlag = $cliFlag;

        return $this;
    }

    public function getCliState(): string
    {
        return $this->cliState;
    }

    public function setCliState(string $cliState): static
    {
        $this->cliState = $cliState;

        return $this;
    }

    public function getCliLat(): ?float
    {
        return $this->cliLat;
    }

    public function setCliLat(?float $cliLat): static
    {
        $this->cliLat = $cliLat;

        return $this;
    }

    public function getCliLng(): ?float
    {
        return $this->cliLng;
    }

    public function setCliLng(?float $cliLng): static
    {
        $this->cliLng = $cliLng;

        return $this;
    }

    public function getSteamId(): string
    {
        return $this->steamId;
    }

    public function setSteamId(string $steamId): static
    {
        $this->steamId = $steamId;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getTeam(): string
    {
        return $this->team;
    }

    public function setTeam(string $team): static
    {
        $this->team = $team;

        return $this;
    }

    public function getKills(): int
    {
        return $this->kills;
    }

    public function setKills(int $kills): static
    {
        $this->kills = $kills;

        return $this;
    }

    public function getDeaths(): int
    {
        return $this->deaths;
    }

    public function setDeaths(int $deaths): static
    {
        $this->deaths = $deaths;

        return $this;
    }

    public function getSuicides(): int
    {
        return $this->suicides;
    }

    public function setSuicides(int $suicides): static
    {
        $this->suicides = $suicides;

        return $this;
    }

    public function getHeadshots(): int
    {
        return $this->headshots;
    }

    public function setHeadshots(int $headshots): static
    {
        $this->headshots = $headshots;

        return $this;
    }

    public function getShots(): int
    {
        return $this->shots;
    }

    public function setShots(int $shots): static
    {
        $this->shots = $shots;

        return $this;
    }

    public function getHits(): int
    {
        return $this->hits;
    }

    public function setHits(int $hits): static
    {
        $this->hits = $hits;

        return $this;
    }

    public function isDead(): bool
    {
        return $this->isDead;
    }

    public function setIsDead(bool $isDead): static
    {
        $this->isDead = $isDead;

        return $this;
    }

    public function getHasBomb(): int
    {
        return $this->hasBomb;
    }

    public function setHasBomb(int $hasBomb): static
    {
        $this->hasBomb = $hasBomb;

        return $this;
    }

    public function getPing(): int
    {
        return $this->ping;
    }

    public function setPing(int $ping): static
    {
        $this->ping = $ping;

        return $this;
    }

    public function getConnected(): int
    {
        return $this->connected;
    }

    public function setConnected(int $connected): static
    {
        $this->connected = $connected;

        return $this;
    }

    public function getSkillChange(): int
    {
        return $this->skillChange;
    }

    public function setSkillChange(int $skillChange): static
    {
        $this->skillChange = $skillChange;

        return $this;
    }

    public function getSkill(): int
    {
        return $this->skill;
    }

    public function setSkill(int $skill): static
    {
        $this->skill = $skill;

        return $this;
    }
}
