<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\RanksRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Table(name: 'hlstats_Ranks')]
#[ORM\Index(name: 'game', columns: ['game'])]
#[ORM\UniqueConstraint(name: 'rankgame', columns: ['image', 'game'])]
#[ORM\Entity(repositoryClass: RanksRepository::class)]
class Ranks
{
    #[ORM\Column(name: 'rankId', type: 'integer', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[ORM\Column(name: 'image', type: 'string', length: 30, nullable: false)]
    private string $image;

    #[ORM\Column(name: 'minKills', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $minkills = 0;

    #[ORM\Column(name: 'maxKills', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $maxkills = 0;

    #[ORM\Column(name: 'rankName', type: 'string', length: 50, nullable: false)]
    private string $rankname;

    #[ManyToOne(targetEntity: Games::class)]
    #[JoinColumn(name: 'game', referencedColumnName: 'code', nullable: false)]
    private Games $game;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getMinkills(): int
    {
        return $this->minkills;
    }

    public function setMinkills(int $minkills): static
    {
        $this->minkills = $minkills;

        return $this;
    }

    public function getMaxkills(): int
    {
        return $this->maxkills;
    }

    public function setMaxkills(int $maxkills): static
    {
        $this->maxkills = $maxkills;

        return $this;
    }

    public function getRankname(): string
    {
        return $this->rankname;
    }

    public function setRankname(string $rankname): static
    {
        $this->rankname = $rankname;

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
}
