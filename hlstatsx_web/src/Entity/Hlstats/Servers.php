<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\ServersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsServers.
 */
#[ORM\Table(name: 'hlstats_Servers')]
#[ORM\UniqueConstraint(name: 'addressport', columns: ['address', 'port'])]
#[ORM\Entity(repositoryClass: ServersRepository::class)]
class Servers
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'serverId', type: 'integer', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $serverid;

    /**
     * @var string
     */
    #[ORM\Column(name: 'address', type: 'string', length: 32, nullable: false)]
    private $address = '';

    /**
     * @var int
     */
    #[ORM\Column(name: 'port', type: 'integer', nullable: false, options: ['unsigned' => true])]
    private $port = '0';

    /**
     * @var string
     */
    #[ORM\Column(name: 'name', type: 'string', length: 255, nullable: false)]
    private $name = '';

    /**
     * @var bool
     */
    #[ORM\Column(name: 'sortorder', type: 'boolean', nullable: false)]
    private $sortorder = '0';

    /**
     * @var string
     */
    #[ORM\Column(name: 'game', type: 'string', length: 32, nullable: false, options: ['default' => 'valve'])]
    private $game = 'valve';

    /**
     * @var string
     */
    #[ORM\Column(name: 'publicaddress', type: 'string', length: 128, nullable: false)]
    private $publicaddress = '';

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'statusurl', type: 'string', length: 255, nullable: true)]
    private $statusurl;

    /**
     * @var string
     */
    #[ORM\Column(name: 'rcon_password', type: 'string', length: 128, nullable: false)]
    private $rconPassword = '';

    /**
     * @var int
     */
    #[ORM\Column(name: 'kills', type: 'integer', nullable: false)]
    private $kills = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'players', type: 'integer', nullable: false)]
    private $players = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'rounds', type: 'integer', nullable: false)]
    private $rounds = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'suicides', type: 'integer', nullable: false)]
    private $suicides = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'headshots', type: 'integer', nullable: false)]
    private $headshots = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'bombs_planted', type: 'integer', nullable: false)]
    private $bombsPlanted = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'bombs_defused', type: 'integer', nullable: false)]
    private $bombsDefused = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'ct_wins', type: 'integer', nullable: false)]
    private $ctWins = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'ts_wins', type: 'integer', nullable: false)]
    private $tsWins = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'act_players', type: 'integer', nullable: false)]
    private $actPlayers = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'max_players', type: 'integer', nullable: false)]
    private $maxPlayers = '0';

    /**
     * @var string
     */
    #[ORM\Column(name: 'act_map', type: 'string', length: 64, nullable: false)]
    private $actMap = '';

    /**
     * @var int
     */
    #[ORM\Column(name: 'map_rounds', type: 'integer', nullable: false)]
    private $mapRounds = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'map_ct_wins', type: 'integer', nullable: false)]
    private $mapCtWins = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'map_ts_wins', type: 'integer', nullable: false)]
    private $mapTsWins = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'map_started', type: 'integer', nullable: false)]
    private $mapStarted = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'map_changes', type: 'integer', nullable: false)]
    private $mapChanges = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'ct_shots', type: 'integer', nullable: false)]
    private $ctShots = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'ct_hits', type: 'integer', nullable: false)]
    private $ctHits = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'ts_shots', type: 'integer', nullable: false)]
    private $tsShots = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'ts_hits', type: 'integer', nullable: false)]
    private $tsHits = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'map_ct_shots', type: 'integer', nullable: false)]
    private $mapCtShots = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'map_ct_hits', type: 'integer', nullable: false)]
    private $mapCtHits = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'map_ts_shots', type: 'integer', nullable: false)]
    private $mapTsShots = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'map_ts_hits', type: 'integer', nullable: false)]
    private $mapTsHits = '0';

    /**
     * @var float|null
     */
    #[ORM\Column(name: 'lat', type: 'float', precision: 7, scale: 4, nullable: true)]
    private $lat;

    /**
     * @var float|null
     */
    #[ORM\Column(name: 'lng', type: 'float', precision: 7, scale: 4, nullable: true)]
    private $lng;

    /**
     * @var string
     */
    #[ORM\Column(name: 'city', type: 'string', length: 64, nullable: false)]
    private $city = '';

    /**
     * @var string
     */
    #[ORM\Column(name: 'country', type: 'string', length: 64, nullable: false)]
    private $country = '';

    /**
     * @var int
     */
    #[ORM\Column(name: 'last_event', type: 'integer', nullable: false, options: ['unsigned' => true])]
    private $lastEvent = '0';

    public function getServerid(): int
    {
        return $this->serverid;
    }

    public function setServerid(int $serverid): Servers
    {
        $this->serverid = $serverid;

        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): Servers
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param int|string $port
     *
     * @return Servers
     */
    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Servers
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return bool|string
     */
    public function getSortorder()
    {
        return $this->sortorder;
    }

    /**
     * @param bool|string $sortorder
     *
     * @return Servers
     */
    public function setSortorder($sortorder)
    {
        $this->sortorder = $sortorder;

        return $this;
    }

    public function getGame(): string
    {
        return $this->game;
    }

    public function setGame(string $game): Servers
    {
        $this->game = $game;

        return $this;
    }

    public function getPublicaddress(): string
    {
        return $this->publicaddress;
    }

    public function setPublicaddress(string $publicaddress): Servers
    {
        $this->publicaddress = $publicaddress;

        return $this;
    }

    public function getStatusurl(): string
    {
        return $this->statusurl;
    }

    public function setStatusurl(string $statusurl): Servers
    {
        $this->statusurl = $statusurl;

        return $this;
    }

    public function getRconPassword(): string
    {
        return $this->rconPassword;
    }

    public function setRconPassword(string $rconPassword): Servers
    {
        $this->rconPassword = $rconPassword;

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
     * @return Servers
     */
    public function setKills($kills)
    {
        $this->kills = $kills;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @param int|string $players
     *
     * @return Servers
     */
    public function setPlayers($players)
    {
        $this->players = $players;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getRounds()
    {
        return $this->rounds;
    }

    /**
     * @param int|string $rounds
     *
     * @return Servers
     */
    public function setRounds($rounds)
    {
        $this->rounds = $rounds;

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
     * @return Servers
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
     * @return Servers
     */
    public function setHeadshots($headshots)
    {
        $this->headshots = $headshots;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getBombsPlanted()
    {
        return $this->bombsPlanted;
    }

    /**
     * @param int|string $bombsPlanted
     *
     * @return Servers
     */
    public function setBombsPlanted($bombsPlanted)
    {
        $this->bombsPlanted = $bombsPlanted;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getBombsDefused()
    {
        return $this->bombsDefused;
    }

    /**
     * @param int|string $bombsDefused
     *
     * @return Servers
     */
    public function setBombsDefused($bombsDefused)
    {
        $this->bombsDefused = $bombsDefused;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getCtWins()
    {
        return $this->ctWins;
    }

    /**
     * @param int|string $ctWins
     *
     * @return Servers
     */
    public function setCtWins($ctWins)
    {
        $this->ctWins = $ctWins;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getTsWins()
    {
        return $this->tsWins;
    }

    /**
     * @param int|string $tsWins
     *
     * @return Servers
     */
    public function setTsWins($tsWins)
    {
        $this->tsWins = $tsWins;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getActPlayers()
    {
        return $this->actPlayers;
    }

    /**
     * @param int|string $actPlayers
     *
     * @return Servers
     */
    public function setActPlayers($actPlayers)
    {
        $this->actPlayers = $actPlayers;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getMaxPlayers()
    {
        return $this->maxPlayers;
    }

    /**
     * @param int|string $maxPlayers
     *
     * @return Servers
     */
    public function setMaxPlayers($maxPlayers)
    {
        $this->maxPlayers = $maxPlayers;

        return $this;
    }

    public function getActMap(): string
    {
        return $this->actMap;
    }

    public function setActMap(string $actMap): Servers
    {
        $this->actMap = $actMap;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getMapRounds()
    {
        return $this->mapRounds;
    }

    /**
     * @param int|string $mapRounds
     *
     * @return Servers
     */
    public function setMapRounds($mapRounds)
    {
        $this->mapRounds = $mapRounds;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getMapCtWins()
    {
        return $this->mapCtWins;
    }

    /**
     * @param int|string $mapCtWins
     *
     * @return Servers
     */
    public function setMapCtWins($mapCtWins)
    {
        $this->mapCtWins = $mapCtWins;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getMapTsWins()
    {
        return $this->mapTsWins;
    }

    /**
     * @param int|string $mapTsWins
     *
     * @return Servers
     */
    public function setMapTsWins($mapTsWins)
    {
        $this->mapTsWins = $mapTsWins;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getMapStarted()
    {
        return $this->mapStarted;
    }

    /**
     * @param int|string $mapStarted
     *
     * @return Servers
     */
    public function setMapStarted($mapStarted)
    {
        $this->mapStarted = $mapStarted;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getMapChanges()
    {
        return $this->mapChanges;
    }

    /**
     * @param int|string $mapChanges
     *
     * @return Servers
     */
    public function setMapChanges($mapChanges)
    {
        $this->mapChanges = $mapChanges;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getCtShots()
    {
        return $this->ctShots;
    }

    /**
     * @param int|string $ctShots
     *
     * @return Servers
     */
    public function setCtShots($ctShots)
    {
        $this->ctShots = $ctShots;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getCtHits()
    {
        return $this->ctHits;
    }

    /**
     * @param int|string $ctHits
     *
     * @return Servers
     */
    public function setCtHits($ctHits)
    {
        $this->ctHits = $ctHits;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getTsShots()
    {
        return $this->tsShots;
    }

    /**
     * @param int|string $tsShots
     *
     * @return Servers
     */
    public function setTsShots($tsShots)
    {
        $this->tsShots = $tsShots;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getTsHits()
    {
        return $this->tsHits;
    }

    /**
     * @param int|string $tsHits
     *
     * @return Servers
     */
    public function setTsHits($tsHits)
    {
        $this->tsHits = $tsHits;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getMapCtShots()
    {
        return $this->mapCtShots;
    }

    /**
     * @param int|string $mapCtShots
     *
     * @return Servers
     */
    public function setMapCtShots($mapCtShots)
    {
        $this->mapCtShots = $mapCtShots;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getMapCtHits()
    {
        return $this->mapCtHits;
    }

    /**
     * @param int|string $mapCtHits
     *
     * @return Servers
     */
    public function setMapCtHits($mapCtHits)
    {
        $this->mapCtHits = $mapCtHits;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getMapTsShots()
    {
        return $this->mapTsShots;
    }

    /**
     * @param int|string $mapTsShots
     *
     * @return Servers
     */
    public function setMapTsShots($mapTsShots)
    {
        $this->mapTsShots = $mapTsShots;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getMapTsHits()
    {
        return $this->mapTsHits;
    }

    /**
     * @param int|string $mapTsHits
     *
     * @return Servers
     */
    public function setMapTsHits($mapTsHits)
    {
        $this->mapTsHits = $mapTsHits;

        return $this;
    }

    public function getLat(): float
    {
        return $this->lat;
    }

    public function setLat(float $lat): Servers
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): float
    {
        return $this->lng;
    }

    public function setLng(float $lng): Servers
    {
        $this->lng = $lng;

        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): Servers
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): Servers
    {
        $this->country = $country;

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
     * @return Servers
     */
    public function setLastEvent($lastEvent)
    {
        $this->lastEvent = $lastEvent;

        return $this;
    }
}
