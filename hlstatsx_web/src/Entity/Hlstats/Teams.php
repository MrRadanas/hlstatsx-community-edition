<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\DBAL\Types\BinaryType;
use App\Repository\Hlstats\TeamsRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;

/**
 * HlstatsTeams.
 */
#[ORM\Table(name: 'hlstats_Teams')]
#[ORM\UniqueConstraint(name: 'gamecode', columns: ['game', 'code'])]
#[ORM\Entity(repositoryClass: TeamsRepository::class)]
class Teams
{
    #[ORM\Column(name: 'teamId', type: 'integer', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[ManyToOne(targetEntity: Games::class)]
    #[JoinColumn(name: 'game', referencedColumnName: 'code', nullable: false)]
    private Games $game;

    #[ORM\Column(name: 'code', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $code = '';

    #[ORM\Column(name: 'name', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $name = '';

    #[ORM\Column(name: 'hidden', type: 'BinaryType', nullable: false, options: ['default' => '0'])]
    #[DoctrineAssert\EnumType(entity: BinaryType::class)]
    private string $hidden = '0';

    #[ORM\Column(name: 'playerlist_bgcolor', type: 'string', length: 7, nullable: true)]
    private ?string $playerlistBgcolor;

    #[ORM\Column(name: 'playerlist_color', type: 'string', length: 7, nullable: true)]
    private ?string $playerlistColor;

    #[ORM\Column(name: 'playerlist_index', type: 'smallint', nullable: false, options: ['default' => 0])]
    private int $playerlistIndex = 0;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Teams
    {
        $this->id = $id;

        return $this;
    }

    public function getGame(): Games
    {
        return $this->game;
    }

    public function setGame(Games $game): Teams
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
        BinaryType::assertValidChoice($hidden);
        $this->hidden = $hidden;

        return $this;
    }

    public function getPlayerlistBgcolor(): ?string
    {
        return $this->playerlistBgcolor;
    }

    public function setPlayerlistBgcolor(?string $playerlistBgcolor): Teams
    {
        $this->playerlistBgcolor = $playerlistBgcolor;

        return $this;
    }

    public function getPlayerlistColor(): ?string
    {
        return $this->playerlistColor;
    }

    public function setPlayerlistColor(?string $playerlistColor): Teams
    {
        $this->playerlistColor = $playerlistColor;

        return $this;
    }

    public function getPlayerlistIndex(): int
    {
        return $this->playerlistIndex;
    }

    public function setPlayerlistIndex(int $playerlistIndex): Teams
    {
        $this->playerlistIndex = $playerlistIndex;

        return $this;
    }
}
