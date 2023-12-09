<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\ClansRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsClans.
 *
 * @ORM\Table(name="hlstats_Clans", uniqueConstraints={@ORM\UniqueConstraint(name="tag", columns={"game", "tag"})}, indexes={@ORM\Index(name="game", columns={"game"})})
 *
 * @ORM\Entity(repositoryClass=ClansRepository::class)(repositoryClass=ClansRepository::class)
 */
class Clans
{
    /**
     * @var int
     *
     * @ORM\Column(name="clanId", type="integer", nullable=false, options={"unsigned": true})
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $clanid;

    /**
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=64, nullable=false)
     */
    private $tag = '';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="homepage", type="string", length=64, nullable=false)
     */
    private $homepage = '';

    /**
     * @var string
     *
     * @ORM\Column(name="game", type="string", length=32, nullable=false)
     */
    private $game = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="hidden", type="boolean", nullable=false)
     */
    private $hidden = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="mapregion", type="string", length=128, nullable=false)
     */
    private $mapregion = '';

    public function getClanid(): int
    {
        return $this->clanid;
    }

    public function setClanid(int $clanid): Clans
    {
        $this->clanid = $clanid;

        return $this;
    }

    public function getTag(): string
    {
        return $this->tag;
    }

    public function setTag(string $tag): Clans
    {
        $this->tag = $tag;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Clans
    {
        $this->name = $name;

        return $this;
    }

    public function getHomepage(): string
    {
        return $this->homepage;
    }

    public function setHomepage(string $homepage): Clans
    {
        $this->homepage = $homepage;

        return $this;
    }

    public function getGame(): string
    {
        return $this->game;
    }

    public function setGame(string $game): Clans
    {
        $this->game = $game;

        return $this;
    }

    /**
     * @return bool|string
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * @param bool|string $hidden
     *
     * @return Clans
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;

        return $this;
    }

    public function getMapregion(): string
    {
        return $this->mapregion;
    }

    public function setMapregion(string $mapregion): Clans
    {
        $this->mapregion = $mapregion;

        return $this;
    }
}
