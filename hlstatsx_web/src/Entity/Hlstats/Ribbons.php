<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\RibbonsRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Table(name: 'hlstats_Ribbons')]
#[ORM\UniqueConstraint(name: 'award', columns: ['awardCode', 'awardCount', 'game', 'special'])]
#[ORM\Entity(repositoryClass: RibbonsRepository::class)]
class Ribbons
{
    #[ORM\Column(name: 'ribbonId', type: 'integer', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[ORM\Column(name: 'awardCode', type: 'string', length: 50, nullable: false)]
    private string $awardcode;

    #[ORM\Column(name: 'awardCount', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $awardcount = 0;

    #[ORM\Column(name: 'special', type: 'smallint', nullable: false, options: ['default' => 0])]
    private int $special = 0;

    #[ManyToOne(targetEntity: Games::class)]
    #[JoinColumn(name: 'game', referencedColumnName: 'code', nullable: false)]
    private Games $game;

    #[ORM\Column(name: 'image', type: 'string', length: 50, nullable: false)]
    private string $image;

    #[ORM\Column(name: 'ribbonName', type: 'string', length: 50, nullable: false)]
    private string $ribbonname;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getAwardcode(): string
    {
        return $this->awardcode;
    }

    public function setAwardcode(string $awardcode): static
    {
        $this->awardcode = $awardcode;

        return $this;
    }

    public function getAwardcount(): int
    {
        return $this->awardcount;
    }

    public function setAwardcount(int $awardcount): static
    {
        $this->awardcount = $awardcount;

        return $this;
    }

    public function getSpecial(): int
    {
        return $this->special;
    }

    public function setSpecial(int $special): static
    {
        $this->special = $special;

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

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getRibbonname(): string
    {
        return $this->ribbonname;
    }

    public function setRibbonname(string $ribbonname): static
    {
        $this->ribbonname = $ribbonname;

        return $this;
    }
}
