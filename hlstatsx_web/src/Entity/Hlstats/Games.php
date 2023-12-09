<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\GamesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsGames.
 *
 * @ORM\Table(name="hlstats_Games")
 *
 * @ORM\Entity(repositoryClass=GamesRepository::class)
 */
class Games
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
    private $code = '';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="hidden", type="string", length=0, nullable=false)
     */
    private $hidden = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="realgame", type="string", length=32, nullable=false, options={"default": "hl2mp"})
     */
    private $realgame = 'hl2mp';

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): Games
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Games
    {
        $this->name = $name;

        return $this;
    }

    public function getHidden(): string
    {
        return $this->hidden;
    }

    public function setHidden(string $hidden): Games
    {
        $this->hidden = $hidden;

        return $this;
    }

    public function getRealgame(): string
    {
        return $this->realgame;
    }

    public function setRealgame(string $realgame): Games
    {
        $this->realgame = $realgame;

        return $this;
    }
}
