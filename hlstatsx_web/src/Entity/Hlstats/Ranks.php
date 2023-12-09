<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\RanksRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsRanks.
 *
 * @ORM\Table(name="hlstats_Ranks", uniqueConstraints={@ORM\UniqueConstraint(name="rankgame", columns={"image", "game"})}, indexes={@ORM\Index(name="game", columns={"game"})})
 *
 * @ORM\Entity(repositoryClass=RanksRepository::class)
 */
class Ranks
{
    /**
     * @var int
     *
     * @ORM\Column(name="rankId", type="integer", nullable=false, options={"unsigned": true})
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rankid;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=30, nullable=false)
     */
    private $image;

    /**
     * @var int
     *
     * @ORM\Column(name="minKills", type="integer", nullable=false, options={"unsigned": true})
     */
    private $minkills = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="maxKills", type="integer", nullable=false)
     */
    private $maxkills = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="rankName", type="string", length=50, nullable=false)
     */
    private $rankname;

    /**
     * @var string
     *
     * @ORM\Column(name="game", type="string", length=32, nullable=false)
     */
    private $game;

    public function getRankid(): int
    {
        return $this->rankid;
    }

    public function setRankid(int $rankid): Ranks
    {
        $this->rankid = $rankid;

        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): Ranks
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getMinkills()
    {
        return $this->minkills;
    }

    /**
     * @param int|string $minkills
     *
     * @return Ranks
     */
    public function setMinkills($minkills)
    {
        $this->minkills = $minkills;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getMaxkills()
    {
        return $this->maxkills;
    }

    /**
     * @param int|string $maxkills
     *
     * @return Ranks
     */
    public function setMaxkills($maxkills)
    {
        $this->maxkills = $maxkills;

        return $this;
    }

    public function getRankname(): string
    {
        return $this->rankname;
    }

    public function setRankname(string $rankname): Ranks
    {
        $this->rankname = $rankname;

        return $this;
    }

    public function getGame(): string
    {
        return $this->game;
    }

    public function setGame(string $game): Ranks
    {
        $this->game = $game;

        return $this;
    }
}
