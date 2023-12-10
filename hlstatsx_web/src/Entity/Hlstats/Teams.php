<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\TeamsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsTeams.
 */
#[ORM\Table(name: 'hlstats_Teams')]
#[ORM\UniqueConstraint(name: 'gamecode', columns: ['game', 'code'])]
#[ORM\Entity(repositoryClass: TeamsRepository::class)]
class Teams
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'teamId', type: 'integer', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $teamid;

    /**
     * @var string
     */
    #[ORM\Column(name: 'game', type: 'string', length: 32, nullable: false, options: ['default' => 'valve'])]
    private $game = 'valve';

    /**
     * @var string
     */
    #[ORM\Column(name: 'code', type: 'string', length: 64, nullable: false)]
    private $code = '';

    /**
     * @var string
     */
    #[ORM\Column(name: 'name', type: 'string', length: 64, nullable: false)]
    private $name = '';

    /**
     * @var string
     */
    #[ORM\Column(name: 'hidden', type: 'string', length: 0, nullable: false)]
    private $hidden = '0';

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'playerlist_bgcolor', type: 'string', length: 7, nullable: true)]
    private $playerlistBgcolor;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'playerlist_color', type: 'string', length: 7, nullable: true)]
    private $playerlistColor;

    /**
     * @var bool
     */
    #[ORM\Column(name: 'playerlist_index', type: 'boolean', nullable: false)]
    private $playerlistIndex = '0';

    public function getTeamid(): int
    {
        return $this->teamid;
    }

    public function setTeamid(int $teamid): Teams
    {
        $this->teamid = $teamid;

        return $this;
    }

    public function getGame(): string
    {
        return $this->game;
    }

    public function setGame(string $game): Teams
    {
        $this->game = $game;

        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): Teams
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Teams
    {
        $this->name = $name;

        return $this;
    }

    public function getHidden(): string
    {
        return $this->hidden;
    }

    public function setHidden(string $hidden): Teams
    {
        $this->hidden = $hidden;

        return $this;
    }

    public function getPlayerlistBgcolor(): string
    {
        return $this->playerlistBgcolor;
    }

    public function setPlayerlistBgcolor(string $playerlistBgcolor): Teams
    {
        $this->playerlistBgcolor = $playerlistBgcolor;

        return $this;
    }

    public function getPlayerlistColor(): string
    {
        return $this->playerlistColor;
    }

    public function setPlayerlistColor(string $playerlistColor): Teams
    {
        $this->playerlistColor = $playerlistColor;

        return $this;
    }

    /**
     * @return bool|string
     */
    public function getPlayerlistIndex()
    {
        return $this->playerlistIndex;
    }

    /**
     * @param bool|string $playerlistIndex
     *
     * @return Teams
     */
    public function setPlayerlistIndex($playerlistIndex)
    {
        $this->playerlistIndex = $playerlistIndex;

        return $this;
    }
}
