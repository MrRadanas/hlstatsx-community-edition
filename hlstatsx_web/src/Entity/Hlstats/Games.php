<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\DBAL\Types\BinaryType;
use App\Repository\Hlstats\GamesRepository;
use Doctrine\ORM\Mapping as ORM;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;

#[ORM\Table(name: 'hlstats_Games')]
#[ORM\Entity(repositoryClass: GamesRepository::class)]
class Games
{
    #[ORM\Column(name: 'code', type: 'string', length: 32, nullable: false, options: ['default' => ''])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private string $code = '';

    #[ORM\Column(name: 'name', type: 'string', length: 128, nullable: false, options: ['default' => ''])]
    private string $name = '';

    #[ORM\Column(type: 'BinaryType')]
    #[DoctrineAssert\EnumType(entity: BinaryType::class)]
    private string $hidden = '0';

    #[ORM\Column(name: 'realgame', type: 'string', length: 32, nullable: false, options: ['default' => 'hl2mp'])]
    private string $realgame = 'hl2mp';

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

    public function getRealgame(): string
    {
        return $this->realgame;
    }

    public function setRealgame(string $realgame): static
    {
        $this->realgame = $realgame;

        return $this;
    }
}
