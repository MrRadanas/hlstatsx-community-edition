<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\AwardsRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Table(name: 'hlstats_Awards')]
#[ORM\UniqueConstraint(name: 'code', columns: ['game', 'awardType', 'code'])]
#[ORM\Entity(repositoryClass: AwardsRepository::class)]
class Awards
{
    #[ORM\Column(name: 'awardId', type: 'integer', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[ORM\Column(name: 'awardType', type: 'string', length: 1, nullable: false, options: ['default' => 'W', 'fixed' => true])]
    private string $awardtype = 'W';

    #[ManyToOne(targetEntity: Games::class)]
    #[JoinColumn(name: 'game', referencedColumnName: 'code', nullable: false)]
    private Games $game;

    #[ORM\Column(name: 'code', type: 'string', length: 128, nullable: false, options: ['default' => ''])]
    private string $code = '';

    #[ORM\Column(name: 'name', type: 'string', length: 128, nullable: false, options: ['default' => ''])]
    private string $name = '';

    #[ORM\Column(name: 'verb', type: 'string', length: 128, nullable: false, options: ['default' => ''])]
    private string $verb = '';

    #[ORM\Column(name: 'd_winner_id', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $dWinnerId;

    #[ORM\Column(name: 'd_winner_count', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $dWinnerCount;

    #[ORM\Column(name: 'g_winner_id', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $gWinnerId;

    #[ORM\Column(name: 'g_winner_count', type: 'integer', nullable: true, options: ['unsigned' => true])]
    private ?int $gWinnerCount;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getAwardtype(): string
    {
        return $this->awardtype;
    }

    public function setAwardtype(string $awardtype): static
    {
        $this->awardtype = $awardtype;

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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getVerb(): string
    {
        return $this->verb;
    }

    public function setVerb(string $verb): static
    {
        $this->verb = $verb;

        return $this;
    }

    public function getDWinnerId(): ?int
    {
        return $this->dWinnerId;
    }

    public function setDWinnerId(int $dWinnerId): static
    {
        $this->dWinnerId = $dWinnerId;

        return $this;
    }

    public function getDWinnerCount(): ?int
    {
        return $this->dWinnerCount;
    }

    public function setDWinnerCount(int $dWinnerCount): static
    {
        $this->dWinnerCount = $dWinnerCount;

        return $this;
    }

    public function getGWinnerId(): ?int
    {
        return $this->gWinnerId;
    }

    public function setGWinnerId(int $gWinnerId): static
    {
        $this->gWinnerId = $gWinnerId;

        return $this;
    }

    public function getGWinnerCount(): ?int
    {
        return $this->gWinnerCount;
    }

    public function setGWinnerCount(int $gWinnerCount): static
    {
        $this->gWinnerCount = $gWinnerCount;

        return $this;
    }
}
