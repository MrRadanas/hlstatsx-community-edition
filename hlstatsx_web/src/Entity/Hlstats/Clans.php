<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\ClansRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @todo разобраться с clan_tag
 */
#[ORM\Table(name: 'hlstats_Clans')]
#[ORM\Index(name: 'game', columns: ['game'])]
#[ORM\UniqueConstraint(name: 'tag', columns: ['game', 'tag'])]
#[ORM\Entity(repositoryClass: ClansRepository::class)]
class Clans
{
    #[ORM\Column(name: 'clanId', type: 'integer', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[ORM\Column(name: 'tag', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $tag = '';

    #[ORM\Column(name: 'name', type: 'string', length: 128, nullable: false, options: ['default' => ''])]
    private string $name = '';

    #[ORM\Column(name: 'homepage', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $homepage = '';

    #[ManyToOne(targetEntity: Games::class)]
    #[JoinColumn(name: 'game', referencedColumnName: 'code', nullable: false)]
    private Games $game;

    #[ORM\Column(name: 'hidden', type: 'boolean', nullable: false, options: ['default' => false])]
    private bool $hidden = false;

    #[ORM\Column(name: 'mapregion', type: 'string', length: 128, nullable: false, options: ['default' => ''])]
    private string $mapregion = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function setTag(string $tag): static
    {
        $this->tag = $tag;

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

    public function getHomepage(): string
    {
        return $this->homepage;
    }

    public function setHomepage(string $homepage): static
    {
        $this->homepage = $homepage;

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

    public function getHidden(): bool
    {
        return $this->hidden;
    }

    public function setHidden(bool $hidden): static
    {
        $this->hidden = $hidden;

        return $this;
    }

    public function getMapregion(): string
    {
        return $this->mapregion;
    }

    public function setMapregion(string $mapregion): static
    {
        $this->mapregion = $mapregion;

        return $this;
    }
}
