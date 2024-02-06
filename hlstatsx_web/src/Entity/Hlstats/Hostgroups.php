<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\HostgroupsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'hlstats_HostGroups')]
#[ORM\Entity(repositoryClass: HostgroupsRepository::class)]
class Hostgroups
{
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[ORM\Column(name: 'pattern', type: 'string', length: 255, nullable: false, options: ['default' => ''])]
    private string $pattern = '';

    #[ORM\Column(name: 'name', type: 'string', length: 255, nullable: false, options: ['default' => ''])]
    private string $name = '';

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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
