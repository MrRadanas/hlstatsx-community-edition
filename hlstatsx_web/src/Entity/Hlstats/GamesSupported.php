<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\GamesSupportedRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsGamesSupported.
 *
 * @ORM\Table(name="hlstats_Games_Supported")
 *
 * @ORM\Entity(repositoryClass=GamesSupportedRepository::class)
 */
class GamesSupported
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=32, nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): GamesSupported
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): GamesSupported
    {
        $this->name = $name;

        return $this;
    }
}
