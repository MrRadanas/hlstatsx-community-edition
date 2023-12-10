<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\DBAL\Types\BinaryType;
use App\Repository\Hlstats\ActionsRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;

#[ORM\Table(name: 'hlstats_Actions')]
#[ORM\Index(name: 'code', columns: ['code'])]
#[ORM\UniqueConstraint(name: 'gamecode', columns: ['code', 'game', 'team'])]
#[ORM\Entity(repositoryClass: ActionsRepository::class)]
class Actions
{
    #[ORM\Column(name: 'id', type: 'integer', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[ManyToOne(targetEntity: Games::class)]
    #[JoinColumn(name: 'game', referencedColumnName: 'code', nullable: false)]
    private Games $game;

    #[ORM\Column(name: 'code', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $code = '';

    #[ORM\Column(name: 'reward_player', type: 'integer', nullable: false, options: ['default' => 10])]
    private int $rewardPlayer = 10;

    #[ORM\Column(name: 'reward_team', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $rewardTeam = 0;

    #[ORM\Column(name: 'team', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $team = '';

    #[ORM\Column(name: 'description', type: 'string', length: 128, nullable: true)]
    private string $description;

    #[ORM\Column(name: 'for_playeractions', type: 'BinaryType', nullable: false, options: ['default' => '0'])]
    #[DoctrineAssert\EnumType(entity: BinaryType::class)]
    private string $forPlayeractions = '0';

    #[ORM\Column(name: 'for_playerplayeractions', type: 'BinaryType', nullable: false, options: ['default' => '0'])]
    #[DoctrineAssert\EnumType(entity: BinaryType::class)]
    private string $forPlayerplayeractions = '0';

    #[ORM\Column(name: 'for_teamactions', type: 'BinaryType', nullable: false, options: ['default' => '0'])]
    #[DoctrineAssert\EnumType(entity: BinaryType::class)]
    private string $forTeamactions = '0';

    #[ORM\Column(name: 'for_worldactions', type: 'BinaryType', nullable: false, options: ['default' => '0'])]
    #[DoctrineAssert\EnumType(entity: BinaryType::class)]
    private string $forWorldactions = '0';
    #[ORM\Column(name: 'count', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $count = 0;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

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

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getRewardPlayer(): int
    {
        return $this->rewardPlayer;
    }

    public function setRewardPlayer(int $rewardPlayer): static
    {
        $this->rewardPlayer = $rewardPlayer;

        return $this;
    }

    public function getRewardTeam(): int
    {
        return $this->rewardTeam;
    }

    public function setRewardTeam(int $rewardTeam): static
    {
        $this->rewardTeam = $rewardTeam;

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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getForPlayeractions(): string
    {
        return $this->forPlayeractions;
    }

    public function setForPlayeractions(string $forPlayeractions): static
    {
        BinaryType::assertValidChoice($forPlayeractions);
        $this->forPlayeractions = $forPlayeractions;

        return $this;
    }

    public function getForPlayerplayeractions(): string
    {
        return $this->forPlayerplayeractions;
    }

    public function setForPlayerplayeractions(string $forPlayerplayeractions): static
    {
        BinaryType::assertValidChoice($forPlayerplayeractions);
        $this->forPlayerplayeractions = $forPlayerplayeractions;

        return $this;
    }

    public function getForTeamactions(): string
    {
        return $this->forTeamactions;
    }

    public function setForTeamactions(string $forTeamactions): static
    {
        BinaryType::assertValidChoice($forTeamactions);
        $this->forTeamactions = $forTeamactions;

        return $this;
    }

    public function getForWorldactions(): string
    {
        return $this->forWorldactions;
    }

    public function setForWorldactions(string $forWorldactions): static
    {
        BinaryType::assertValidChoice($forWorldactions);
        $this->forWorldactions = $forWorldactions;

        return $this;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function setCount(int $count): static
    {
        $this->count = $count;

        return $this;
    }
}
