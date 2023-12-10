<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\DBAL\Types\ClanTagsPosition;
use App\Repository\Hlstats\ClantagsRepository;
use Doctrine\ORM\Mapping as ORM;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;

#[ORM\Table(name: 'hlstats_ClanTags')]
#[ORM\UniqueConstraint(name: 'pattern', columns: ['pattern'])]
#[ORM\Entity(repositoryClass: ClantagsRepository::class)]
class Clantags
{
    #[ORM\Column(name: 'id', type: 'integer', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[ORM\Column(name: 'pattern', type: 'string', length: 64, nullable: false)]
    private string $pattern;

    #[ORM\Column(name: 'position', type: 'ClanTagsPosition', nullable: false, options: ['default' => 'EITHER'])]
    #[DoctrineAssert\EnumType(entity: ClanTagsPosition::class)]
    private string $position = 'EITHER';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getPattern(): string
    {
        return $this->pattern;
    }

    public function setPattern(string $pattern): static
    {
        $this->pattern = $pattern;

        return $this;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): static
    {
        ClanTagsPosition::assertValidChoice($position);
        $this->position = $position;

        return $this;
    }
}
