<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\PlayersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'hlstats_Players')]
#[ORM\Index(name: 'playerclan', columns: ['clan', 'playerId'])]
#[ORM\Index(name: 'skill', columns: ['skill'])]
#[ORM\Index(name: 'game', columns: ['game'])]
#[ORM\Index(name: 'kills', columns: ['kills'])]
#[ORM\Index(name: 'hideranking', columns: ['hideranking'])]
#[ORM\Entity(repositoryClass: PlayersRepository::class)]
class Players
{
    #[ORM\Column(name: 'playerId', type: 'integer', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private int $playerid;

    #[ORM\Column(name: 'last_event', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $lastEvent = 0;

    #[ORM\Column(name: 'connection_time', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $connectionTime = 0;

    #[ORM\Column(name: 'lastName', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $lastname = '';

    #[ORM\Column(name: 'lastAddress', type: 'string', length: 32, nullable: false, options: ['default' => ''])]
    private string $lastaddress = '';

    #[ORM\Column(name: 'city', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $city = '';

    #[ORM\Column(name: 'state', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $state = '';

    #[ORM\Column(name: 'country', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $country = '';

    #[ORM\Column(name: 'flag', type: 'string', length: 16, nullable: false, options: ['default' => ''])]
    private string $flag = '';

    #[ORM\Column(name: 'lat', type: 'float', precision: 7, scale: 4, nullable: true)]
    private ?float $lat;

    #[ORM\Column(name: 'lng', type: 'float', precision: 7, scale: 4, nullable: true)]
    private ?float $lng;

    #[ORM\Column(name: 'clan', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $clan = 0;

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

    #[ORM\Column(name: 'teamkills', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $teamkills = 0;

    #[ORM\Column(name: 'fullName', type: 'string', length: 128, nullable: true)]
    private ?string $fullname;

    #[ORM\Column(name: 'email', type: 'string', length: 64, nullable: true)]
    private ?string $email;

    #[ORM\Column(name: 'homepage', type: 'string', length: 64, nullable: true)]
    private ?string $homepage;

    #[ORM\Column(name: 'icq', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $icq;

    #[ORM\Column(name: 'mmrank', type: 'smallint', nullable: true)]
    private ?int $mmrank;

    #[ORM\Column(name: 'game', type: 'string', length: 32, nullable: false)]
    private string $game;

    #[ORM\Column(name: 'hideranking', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $hideranking = 0;

    #[ORM\Column(name: 'headshots', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $headshots = 0;

    #[ORM\Column(name: 'last_skill_change', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $lastSkillChange = 0;

    #[ORM\Column(name: 'displayEvents', type: 'integer', nullable: false, options: ['default' => 1, 'unsigned' => true])]
    private int $displayevents = 1;

    #[ORM\Column(name: 'kill_streak', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $killStreak = 0;

    #[ORM\Column(name: 'death_streak', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $deathStreak = 0;

    #[ORM\Column(name: 'blockavatar', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $blockavatar = 0;

    #[ORM\Column(name: 'activity', type: 'integer', nullable: false, options: ['default' => 100])]
    private int $activity = 100;

    #[ORM\Column(name: 'createdate', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $createdate = 0;

    public function getPlayerid(): int
    {
        return $this->playerid;
    }

    public function setPlayerid(int $playerid): Players
    {
        $this->playerid = $playerid;

        return $this;
    }

    public function getLastEvent(): int
    {
        return $this->lastEvent;
    }

    public function setLastEvent(int $lastEvent): Players
    {
        $this->lastEvent = $lastEvent;

        return $this;
    }

    public function getConnectionTime(): int
    {
        return $this->connectionTime;
    }

    public function setConnectionTime(int $connectionTime): Players
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

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(?float $lat): Players
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): ?float
    {
        return $this->lng;
    }

    public function setLng(?float $lng): Players
    {
        $this->lng = $lng;

        return $this;
    }

    public function getClan(): int
    {
        return $this->clan;
    }

    public function setClan(int $clan): Players
    {
        $this->clan = $clan;

        return $this;
    }

    public function getKills(): int
    {
        return $this->kills;
    }

    public function setKills(int $kills): Players
    {
        $this->kills = $kills;

        return $this;
    }

    public function getDeaths(): int
    {
        return $this->deaths;
    }

    public function setDeaths(int $deaths): Players
    {
        $this->deaths = $deaths;

        return $this;
    }

    public function getSuicides(): int
    {
        return $this->suicides;
    }

    public function setSuicides(int $suicides): Players
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

    public function getShots(): int
    {
        return $this->shots;
    }

    public function setShots(int $shots): Players
    {
        $this->shots = $shots;

        return $this;
    }

    public function getHits(): int
    {
        return $this->hits;
    }

    public function setHits(int $hits): Players
    {
        $this->hits = $hits;

        return $this;
    }

    public function getTeamkills(): int
    {
        return $this->teamkills;
    }

    public function setTeamkills(int $teamkills): Players
    {
        $this->teamkills = $teamkills;

        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(?string $fullname): Players
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): Players
    {
        $this->email = $email;

        return $this;
    }

    public function getHomepage(): ?string
    {
        return $this->homepage;
    }

    public function setHomepage(?string $homepage): Players
    {
        $this->homepage = $homepage;

        return $this;
    }

    public function getIcq(): ?int
    {
        return $this->icq;
    }

    public function setIcq(?int $icq): Players
    {
        $this->icq = $icq;

        return $this;
    }

    public function getMmrank(): ?int
    {
        return $this->mmrank;
    }

    public function setMmrank(?int $mmrank): Players
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

    public function getHideranking(): int
    {
        return $this->hideranking;
    }

    public function setHideranking(int $hideranking): Players
    {
        $this->hideranking = $hideranking;

        return $this;
    }

    public function getHeadshots(): int
    {
        return $this->headshots;
    }

    public function setHeadshots(int $headshots): Players
    {
        $this->headshots = $headshots;

        return $this;
    }

    public function getLastSkillChange(): int
    {
        return $this->lastSkillChange;
    }

    public function setLastSkillChange(int $lastSkillChange): Players
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

    public function getKillStreak(): int
    {
        return $this->killStreak;
    }

    public function setKillStreak(int $killStreak): Players
    {
        $this->killStreak = $killStreak;

        return $this;
    }

    public function getDeathStreak(): int
    {
        return $this->deathStreak;
    }

    public function setDeathStreak(int $deathStreak): Players
    {
        $this->deathStreak = $deathStreak;

        return $this;
    }

    public function getBlockavatar(): int
    {
        return $this->blockavatar;
    }

    public function setBlockavatar(int $blockavatar): Players
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

    public function getCreatedate(): int
    {
        return $this->createdate;
    }

    public function setCreatedate(int $createdate): Players
    {
        $this->createdate = $createdate;

        return $this;
    }
}
