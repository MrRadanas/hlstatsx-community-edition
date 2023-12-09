<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\RibbonsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsRibbons.
 *
 * @ORM\Table(name="hlstats_Ribbons", uniqueConstraints={@ORM\UniqueConstraint(name="award", columns={"awardCode", "awardCount", "game", "special"})})
 *
 * @ORM\Entity(repositoryClass=RibbonsRepository::class)
 */
class Ribbons
{
    /**
     * @var int
     *
     * @ORM\Column(name="ribbonId", type="integer", nullable=false, options={"unsigned": true})
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ribbonid;

    /**
     * @var string
     *
     * @ORM\Column(name="awardCode", type="string", length=50, nullable=false)
     */
    private $awardcode;

    /**
     * @var int
     *
     * @ORM\Column(name="awardCount", type="integer", nullable=false)
     */
    private $awardcount = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="special", type="boolean", nullable=false)
     */
    private $special = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="game", type="string", length=32, nullable=false)
     */
    private $game;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=50, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="ribbonName", type="string", length=50, nullable=false)
     */
    private $ribbonname;

    public function getRibbonid(): int
    {
        return $this->ribbonid;
    }

    public function setRibbonid(int $ribbonid): Ribbons
    {
        $this->ribbonid = $ribbonid;

        return $this;
    }

    public function getAwardcode(): string
    {
        return $this->awardcode;
    }

    public function setAwardcode(string $awardcode): Ribbons
    {
        $this->awardcode = $awardcode;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getAwardcount()
    {
        return $this->awardcount;
    }

    /**
     * @param int|string $awardcount
     *
     * @return Ribbons
     */
    public function setAwardcount($awardcount)
    {
        $this->awardcount = $awardcount;

        return $this;
    }

    /**
     * @return bool|string
     */
    public function getSpecial()
    {
        return $this->special;
    }

    /**
     * @param bool|string $special
     *
     * @return Ribbons
     */
    public function setSpecial($special)
    {
        $this->special = $special;

        return $this;
    }

    public function getGame(): string
    {
        return $this->game;
    }

    public function setGame(string $game): Ribbons
    {
        $this->game = $game;

        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): Ribbons
    {
        $this->image = $image;

        return $this;
    }

    public function getRibbonname(): string
    {
        return $this->ribbonname;
    }

    public function setRibbonname(string $ribbonname): Ribbons
    {
        $this->ribbonname = $ribbonname;

        return $this;
    }
}
