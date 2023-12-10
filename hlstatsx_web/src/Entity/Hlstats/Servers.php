<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\ServersRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Table(name: 'hlstats_Servers')]
#[ORM\UniqueConstraint(name: 'addressport', columns: ['address', 'port'])]
#[ORM\Entity(repositoryClass: ServersRepository::class)]
class Servers
{
    #[ORM\Column(name: 'serverId', type: 'integer', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[ORM\Column(name: 'address', type: 'string', length: 32, nullable: false, options: ['default' => ''])]
    private string $address = '';

    #[ORM\Column(name: 'port', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $port = 0;

    #[ORM\Column(name: 'name', type: 'string', length: 255, nullable: false, options: ['default' => ''])]
    private string $name = '';

    #[ORM\Column(name: 'sortorder', type: 'smallint', nullable: false, options: ['default' => 0])]
    private int $sortorder = 0;

    #[ManyToOne(targetEntity: Games::class)]
    #[JoinColumn(name: 'game', referencedColumnName: 'code', nullable: false)]
    private Games $game;

    #[ORM\Column(name: 'publicaddress', type: 'string', length: 128, nullable: false, options: ['default' => ''])]
    private string $publicaddress = '';

    #[ORM\Column(name: 'statusurl', type: 'string', length: 255, nullable: true)]
    private ?string $statusurl;

    #[ORM\Column(name: 'rcon_password', type: 'string', length: 128, nullable: false, options: ['default' => ''])]
    private string $rconPassword = '';

    #[ORM\Column(name: 'kills', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $kills = 0;

    #[ORM\Column(name: 'players', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $players = 0;

    #[ORM\Column(name: 'rounds', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $rounds = 0;

    #[ORM\Column(name: 'suicides', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $suicides = 0;

    #[ORM\Column(name: 'headshots', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $headshots = 0;

    #[ORM\Column(name: 'bombs_planted', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $bombsPlanted = 0;

    #[ORM\Column(name: 'bombs_defused', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $bombsDefused = 0;

    #[ORM\Column(name: 'ct_wins', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $ctWins = 0;

    #[ORM\Column(name: 'ts_wins', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $tsWins = 0;

    #[ORM\Column(name: 'act_players', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $actPlayers = 0;

    #[ORM\Column(name: 'max_players', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $maxPlayers = 0;

    #[ORM\Column(name: 'act_map', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $actMap = '';

    #[ORM\Column(name: 'map_rounds', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $mapRounds = 0;

    #[ORM\Column(name: 'map_ct_wins', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $mapCtWins = 0;

    #[ORM\Column(name: 'map_ts_wins', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $mapTsWins = 0;

    #[ORM\Column(name: 'map_started', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $mapStarted = 0;

    #[ORM\Column(name: 'map_changes', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $mapChanges = 0;

    #[ORM\Column(name: 'ct_shots', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $ctShots = 0;

    #[ORM\Column(name: 'ct_hits', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $ctHits = 0;

    #[ORM\Column(name: 'ts_shots', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $tsShots = 0;

    #[ORM\Column(name: 'ts_hits', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $tsHits = 0;

    #[ORM\Column(name: 'map_ct_shots', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $mapCtShots = 0;

    #[ORM\Column(name: 'map_ct_hits', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $mapCtHits = 0;

    #[ORM\Column(name: 'map_ts_shots', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $mapTsShots = 0;

    #[ORM\Column(name: 'map_ts_hits', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $mapTsHits = 0;

    #[ORM\Column(name: 'lat', type: 'float', precision: 7, scale: 4, nullable: true)]
    private ?float $lat;

    #[ORM\Column(name: 'lng', type: 'float', precision: 7, scale: 4, nullable: true)]
    private ?float $lng;

    #[ORM\Column(name: 'city', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $city = '';

    #[ORM\Column(name: 'country', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $country = '';

    #[ORM\Column(name: 'last_event', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $lastEvent = 0;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function setPort(int $port): static
    {
        $this->port = $port;

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

    public function getSortorder(): int
    {
        return $this->sortorder;
    }

    public function setSortorder(int $sortorder): static
    {
        $this->sortorder = $sortorder;

        return $this;
    }

    public function getGame(): Games
    {
        return $this->game;
    }

    public function setGame(Games $game): static
    {
        $this->game = $game;

        return $this;
    }

    public function getPublicaddress(): string
    {
        return $this->publicaddress;
    }

    public function setPublicaddress(string $publicaddress): static
    {
        $this->publicaddress = $publicaddress;

        return $this;
    }

    public function getStatusurl(): ?string
    {
        return $this->statusurl;
    }

    public function setStatusurl(?string $statusurl): static
    {
        $this->statusurl = $statusurl;

        return $this;
    }

    public function getRconPassword(): string
    {
        return $this->rconPassword;
    }

    public function setRconPassword(string $rconPassword): static
    {
        $this->rconPassword = $rconPassword;

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

    public function getPlayers(): int
    {
        return $this->players;
    }

    public function setPlayers(int $players): static
    {
        $this->players = $players;

        return $this;
    }

    public function getRounds(): int
    {
        return $this->rounds;
    }

    public function setRounds(int $rounds): static
    {
        $this->rounds = $rounds;

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

    public function getBombsPlanted(): int
    {
        return $this->bombsPlanted;
    }

    public function setBombsPlanted(int $bombsPlanted): static
    {
        $this->bombsPlanted = $bombsPlanted;

        return $this;
    }

    public function getBombsDefused(): int
    {
        return $this->bombsDefused;
    }

    public function setBombsDefused(int $bombsDefused): static
    {
        $this->bombsDefused = $bombsDefused;

        return $this;
    }

    public function getCtWins(): int
    {
        return $this->ctWins;
    }

    public function setCtWins(int $ctWins): static
    {
        $this->ctWins = $ctWins;

        return $this;
    }

    public function getTsWins(): int
    {
        return $this->tsWins;
    }

    public function setTsWins(int $tsWins): static
    {
        $this->tsWins = $tsWins;

        return $this;
    }

    public function getActPlayers(): int
    {
        return $this->actPlayers;
    }

    public function setActPlayers(int $actPlayers): static
    {
        $this->actPlayers = $actPlayers;

        return $this;
    }

    public function getMaxPlayers(): int
    {
        return $this->maxPlayers;
    }

    public function setMaxPlayers(int $maxPlayers): static
    {
        $this->maxPlayers = $maxPlayers;

        return $this;
    }

    public function getActMap(): string
    {
        return $this->actMap;
    }

    public function setActMap(string $actMap): static
    {
        $this->actMap = $actMap;

        return $this;
    }

    public function getMapRounds(): int
    {
        return $this->mapRounds;
    }

    public function setMapRounds(int $mapRounds): static
    {
        $this->mapRounds = $mapRounds;

        return $this;
    }

    public function getMapCtWins(): int
    {
        return $this->mapCtWins;
    }

    public function setMapCtWins(int $mapCtWins): static
    {
        $this->mapCtWins = $mapCtWins;

        return $this;
    }

    public function getMapTsWins(): int
    {
        return $this->mapTsWins;
    }

    public function setMapTsWins(int $mapTsWins): static
    {
        $this->mapTsWins = $mapTsWins;

        return $this;
    }

    public function getMapStarted(): int
    {
        return $this->mapStarted;
    }

    public function setMapStarted(int $mapStarted): static
    {
        $this->mapStarted = $mapStarted;

        return $this;
    }

    public function getMapChanges(): int
    {
        return $this->mapChanges;
    }

    public function setMapChanges(int $mapChanges): static
    {
        $this->mapChanges = $mapChanges;

        return $this;
    }

    public function getCtShots(): int
    {
        return $this->ctShots;
    }

    public function setCtShots(int $ctShots): static
    {
        $this->ctShots = $ctShots;

        return $this;
    }

    public function getCtHits(): int
    {
        return $this->ctHits;
    }

    public function setCtHits(int $ctHits): static
    {
        $this->ctHits = $ctHits;

        return $this;
    }

    public function getTsShots(): int
    {
        return $this->tsShots;
    }

    public function setTsShots(int $tsShots): static
    {
        $this->tsShots = $tsShots;

        return $this;
    }

    public function getTsHits(): int
    {
        return $this->tsHits;
    }

    public function setTsHits(int $tsHits): static
    {
        $this->tsHits = $tsHits;

        return $this;
    }

    public function getMapCtShots(): int
    {
        return $this->mapCtShots;
    }

    public function setMapCtShots(int $mapCtShots): static
    {
        $this->mapCtShots = $mapCtShots;

        return $this;
    }

    public function getMapCtHits(): int
    {
        return $this->mapCtHits;
    }

    public function setMapCtHits(int $mapCtHits): static
    {
        $this->mapCtHits = $mapCtHits;

        return $this;
    }

    public function getMapTsShots(): int
    {
        return $this->mapTsShots;
    }

    public function setMapTsShots(int $mapTsShots): static
    {
        $this->mapTsShots = $mapTsShots;

        return $this;
    }

    public function getMapTsHits(): int
    {
        return $this->mapTsHits;
    }

    public function setMapTsHits(int $mapTsHits): static
    {
        $this->mapTsHits = $mapTsHits;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(?float $lat): static
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): ?float
    {
        return $this->lng;
    }

    public function setLng(?float $lng): static
    {
        $this->lng = $lng;

        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getLastEvent(): int
    {
        return $this->lastEvent;
    }

    public function setLastEvent(int $lastEvent): static
    {
        $this->lastEvent = $lastEvent;

        return $this;
    }
}
