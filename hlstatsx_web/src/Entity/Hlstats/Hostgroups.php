<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\HostgroupsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsHostgroups.
 *
 * @ORM\Table(name="hlstats_HostGroups")
 *
 * @ORM\Entity(repositoryClass=HostgroupsRepository::class)
 */
class Hostgroups
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="pattern", type="string", length=255, nullable=false)
     */
    private $pattern = '';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Hostgroups
    {
        $this->id = $id;

        return $this;
    }

    public function getPattern(): string
    {
        return $this->pattern;
    }

    public function setPattern(string $pattern): Hostgroups
    {
        $this->pattern = $pattern;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Hostgroups
    {
        $this->name = $name;

        return $this;
    }
}
