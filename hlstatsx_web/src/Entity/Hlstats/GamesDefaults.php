<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\GamesDefaultsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsGamesDefaults.
 *
 * @ORM\Table(name="hlstats_Games_Defaults")
 *
 * @ORM\Entity(repositoryClass=GamesDefaultsRepository::class)
 */
class GamesDefaults
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=32, nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="parameter", type="string", length=50, nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $parameter;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=128, nullable=false)
     */
    private $value;

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): GamesDefaults
    {
        $this->code = $code;

        return $this;
    }

    public function getParameter(): string
    {
        return $this->parameter;
    }

    public function setParameter(string $parameter): GamesDefaults
    {
        $this->parameter = $parameter;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): GamesDefaults
    {
        $this->value = $value;

        return $this;
    }
}
