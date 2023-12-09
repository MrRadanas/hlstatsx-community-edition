<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\ClantagsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsClantags.
 *
 * @ORM\Table(name="hlstats_ClanTags", uniqueConstraints={@ORM\UniqueConstraint(name="pattern", columns={"pattern"})})
 *
 * @ORM\Entity(repositoryClass=ClantagsRepository::class)
 */
class Clantags
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned": true})
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="pattern", type="string", length=64, nullable=false)
     */
    private $pattern;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=0, nullable=false, options={"default": "EITHER"})
     */
    private $position = 'EITHER';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Clantags
    {
        $this->id = $id;

        return $this;
    }

    public function getPattern(): string
    {
        return $this->pattern;
    }

    public function setPattern(string $pattern): Clantags
    {
        $this->pattern = $pattern;

        return $this;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function setPosition(string $position): Clantags
    {
        $this->position = $position;

        return $this;
    }
}
