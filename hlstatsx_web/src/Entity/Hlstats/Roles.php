<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\DBAL\Types\BinaryType;
use App\Repository\Hlstats\RolesRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;

#[ORM\Table(name: 'hlstats_Roles')]
#[ORM\UniqueConstraint(name: 'gamecode', columns: ['game', 'code'])]
#[ORM\Entity(repositoryClass: RolesRepository::class)]
class Roles
{
    #[ORM\Column(name: 'roleId', type: 'integer', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private int $roleid;

    #[ManyToOne(targetEntity: Games::class)]
    #[JoinColumn(name: 'game', referencedColumnName: 'code', nullable: false)]
    private Games $game;

    #[ORM\Column(name: 'code', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $code = '';

    #[ORM\Column(name: 'name', type: 'string', length: 64, nullable: false, options: ['default' => ''])]
    private string $name = '';

    #[ORM\Column(type: 'BinaryType', options: ['default' => '0'])]
    #[DoctrineAssert\EnumType(entity: BinaryType::class)]
    private string $hidden = '0';

    #[ORM\Column(name: 'picked', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $picked = 0;

    #[ORM\Column(name: 'kills', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $kills = 0;

    #[ORM\Column(name: 'deaths', type: 'integer', nullable: false, options: ['unsigned' => true, 'default' => 0])]
    private int $deaths = 0;

    public function getRoleid(): int
    {
        return $this->roleid;
    }

    public function setRoleid(int $roleid): static
    {
        $this->roleid = $roleid;

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

    public function getHidden(): string
    {
        return $this->hidden;
    }

    public function setHidden(string $hidden): static
    {
        BinaryType::assertValidChoice($hidden);
        $this->hidden = $hidden;

        return $this;
    }

    public function getPicked(): int
    {
        return $this->picked;
    }

    public function setPicked(int $picked): static
    {
        $this->picked = $picked;

        return $this;
    }

    public function getKills(): int
    {
        return $this->kills;
    }

    public function setKills(int $kills): static
    {
        $this->kills = $kills;

        return $this;
    }

    public function getDeaths(): int
    {
        return $this->deaths;
    }

    public function setDeaths(int $deaths): static
    {
        $this->deaths = $deaths;

        return $this;
    }
}
