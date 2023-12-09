<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\ActionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsActions.
 *
 * @ORM\Table(name="hlstats_Actions", uniqueConstraints={@ORM\UniqueConstraint(name="gamecode", columns={"code", "game", "team"})}, indexes={@ORM\Index(name="code", columns={"code"})})
 *
 * @ORM\Entity(repositoryClass=ActionsRepository::class)
 */
class Actions
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned": true})
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;

    /**
     * @var string
     *
     * @ORM\Column(name="game", type="string", length=32, nullable=false, options={"default": "valve"})
     */
    private string $game = 'valve';

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=64, nullable=false)
     */
    private string $code = '';

    /**
     * @var int
     *
     * @ORM\Column(name="reward_player", type="integer", nullable=false, options={"default": "10"})
     */
    private int $rewardPlayer = 10;

    /**
     * @var int
     *
     * @ORM\Column(name="reward_team", type="integer", nullable=false)
     */
    private int $rewardTeam = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="team", type="string", length=64, nullable=false)
     */
    private string $team = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=128, nullable=true)
     */
    private string $description;

    /**
     * @var string
     *
     * @ORM\Column(name="for_PlayerActions", type="string", length=0, nullable=false)
     */
    private string $forPlayeractions = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="for_PlayerPlayerActions", type="string", length=0, nullable=false)
     */
    private string $forPlayerplayeractions = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="for_TeamActions", type="string", length=0, nullable=false)
     */
    private string $forTeamactions = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="for_WorldActions", type="string", length=0, nullable=false)
     */
    private string $forWorldactions = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="count", type="integer", nullable=false, options={"unsigned": true})
     */
    private $count = '0';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Actions
    {
        $this->id = $id;

        return $this;
    }

    public function getGame(): string
    {
        return $this->game;
    }

    public function setGame(string $game): Actions
    {
        $this->game = $game;

        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): Actions
    {
        $this->code = $code;

        return $this;
    }

    public function getRewardPlayer(): int
    {
        return $this->rewardPlayer;
    }

    public function setRewardPlayer(int $rewardPlayer): Actions
    {
        $this->rewardPlayer = $rewardPlayer;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getRewardTeam()
    {
        return $this->rewardTeam;
    }

    /**
     * @param int|string $rewardTeam
     *
     * @return Actions
     */
    public function setRewardTeam($rewardTeam)
    {
        $this->rewardTeam = $rewardTeam;

        return $this;
    }

    public function getTeam(): string
    {
        return $this->team;
    }

    public function setTeam(string $team): Actions
    {
        $this->team = $team;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Actions
    {
        $this->description = $description;

        return $this;
    }

    public function getForPlayeractions(): string
    {
        return $this->forPlayeractions;
    }

    public function setForPlayeractions(string $forPlayeractions): Actions
    {
        $this->forPlayeractions = $forPlayeractions;

        return $this;
    }

    public function getForPlayerplayeractions(): string
    {
        return $this->forPlayerplayeractions;
    }

    public function setForPlayerplayeractions(string $forPlayerplayeractions): Actions
    {
        $this->forPlayerplayeractions = $forPlayerplayeractions;

        return $this;
    }

    public function getForTeamactions(): string
    {
        return $this->forTeamactions;
    }

    public function setForTeamactions(string $forTeamactions): Actions
    {
        $this->forTeamactions = $forTeamactions;

        return $this;
    }

    public function getForWorldactions(): string
    {
        return $this->forWorldactions;
    }

    public function setForWorldactions(string $forWorldactions): Actions
    {
        $this->forWorldactions = $forWorldactions;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int|string $count
     *
     * @return Actions
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }
}
