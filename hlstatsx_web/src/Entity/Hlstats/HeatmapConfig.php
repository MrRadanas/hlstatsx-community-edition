<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\HeatmapConfigRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsHeatmapConfig.
 *
 * @ORM\Table(name="hlstats_Heatmap_Config", uniqueConstraints={@ORM\UniqueConstraint(name="gamemap", columns={"map", "game"})})
 *
 * @ORM\Entity(repositoryClass=HeatmapConfigRepository::class)
 */
class HeatmapConfig
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
     * @ORM\Column(name="map", type="string", length=64, nullable=false)
     */
    private $map;

    /**
     * @var string
     *
     * @ORM\Column(name="game", type="string", length=32, nullable=false)
     */
    private $game;

    /**
     * @var float
     *
     * @ORM\Column(name="xoffset", type="float", precision=10, scale=0, nullable=false)
     */
    private $xoffset;

    /**
     * @var float
     *
     * @ORM\Column(name="yoffset", type="float", precision=10, scale=0, nullable=false)
     */
    private $yoffset;

    /**
     * @var bool
     *
     * @ORM\Column(name="flipx", type="boolean", nullable=false)
     */
    private $flipx = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="flipy", type="boolean", nullable=false, options={"default": "1"})
     */
    private $flipy = true;

    /**
     * @var bool
     *
     * @ORM\Column(name="rotate", type="boolean", nullable=false)
     */
    private $rotate = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="days", type="boolean", nullable=false, options={"default": "30"})
     */
    private $days = '30';

    /**
     * @var string
     *
     * @ORM\Column(name="brush", type="string", length=5, nullable=false, options={"default": "small"})
     */
    private $brush = 'small';

    /**
     * @var float
     *
     * @ORM\Column(name="scale", type="float", precision=10, scale=0, nullable=false)
     */
    private $scale;

    /**
     * @var bool
     *
     * @ORM\Column(name="font", type="boolean", nullable=false, options={"default": "10"})
     */
    private $font = '10';

    /**
     * @var float
     *
     * @ORM\Column(name="thumbw", type="float", precision=10, scale=0, nullable=false, options={"default": "0.170312"})
     */
    private $thumbw = 0.170312;

    /**
     * @var float
     *
     * @ORM\Column(name="thumbh", type="float", precision=10, scale=0, nullable=false, options={"default": "0.170312"})
     */
    private $thumbh = 0.170312;

    /**
     * @var int
     *
     * @ORM\Column(name="cropx1", type="integer", nullable=false)
     */
    private $cropx1 = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="cropy1", type="integer", nullable=false)
     */
    private $cropy1 = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="cropx2", type="integer", nullable=false)
     */
    private $cropx2 = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="cropy2", type="integer", nullable=false)
     */
    private $cropy2 = '0';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): HeatmapConfig
    {
        $this->id = $id;

        return $this;
    }

    public function getMap(): string
    {
        return $this->map;
    }

    public function setMap(string $map): HeatmapConfig
    {
        $this->map = $map;

        return $this;
    }

    public function getGame(): string
    {
        return $this->game;
    }

    public function setGame(string $game): HeatmapConfig
    {
        $this->game = $game;

        return $this;
    }

    public function getXoffset(): float
    {
        return $this->xoffset;
    }

    public function setXoffset(float $xoffset): HeatmapConfig
    {
        $this->xoffset = $xoffset;

        return $this;
    }

    public function getYoffset(): float
    {
        return $this->yoffset;
    }

    public function setYoffset(float $yoffset): HeatmapConfig
    {
        $this->yoffset = $yoffset;

        return $this;
    }

    /**
     * @return bool|string
     */
    public function getFlipx()
    {
        return $this->flipx;
    }

    /**
     * @param bool|string $flipx
     *
     * @return HeatmapConfig
     */
    public function setFlipx($flipx)
    {
        $this->flipx = $flipx;

        return $this;
    }

    public function isFlipy(): bool
    {
        return $this->flipy;
    }

    public function setFlipy(bool $flipy): HeatmapConfig
    {
        $this->flipy = $flipy;

        return $this;
    }

    /**
     * @return bool|string
     */
    public function getRotate()
    {
        return $this->rotate;
    }

    /**
     * @param bool|string $rotate
     *
     * @return HeatmapConfig
     */
    public function setRotate($rotate)
    {
        $this->rotate = $rotate;

        return $this;
    }

    /**
     * @return bool|string
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @param bool|string $days
     *
     * @return HeatmapConfig
     */
    public function setDays($days)
    {
        $this->days = $days;

        return $this;
    }

    public function getBrush(): string
    {
        return $this->brush;
    }

    public function setBrush(string $brush): HeatmapConfig
    {
        $this->brush = $brush;

        return $this;
    }

    public function getScale(): float
    {
        return $this->scale;
    }

    public function setScale(float $scale): HeatmapConfig
    {
        $this->scale = $scale;

        return $this;
    }

    /**
     * @return bool|string
     */
    public function getFont()
    {
        return $this->font;
    }

    /**
     * @param bool|string $font
     *
     * @return HeatmapConfig
     */
    public function setFont($font)
    {
        $this->font = $font;

        return $this;
    }

    public function getThumbw(): float
    {
        return $this->thumbw;
    }

    public function setThumbw(float $thumbw): HeatmapConfig
    {
        $this->thumbw = $thumbw;

        return $this;
    }

    public function getThumbh(): float
    {
        return $this->thumbh;
    }

    public function setThumbh(float $thumbh): HeatmapConfig
    {
        $this->thumbh = $thumbh;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getCropx1()
    {
        return $this->cropx1;
    }

    /**
     * @param int|string $cropx1
     *
     * @return HeatmapConfig
     */
    public function setCropx1($cropx1)
    {
        $this->cropx1 = $cropx1;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getCropy1()
    {
        return $this->cropy1;
    }

    /**
     * @param int|string $cropy1
     *
     * @return HeatmapConfig
     */
    public function setCropy1($cropy1)
    {
        $this->cropy1 = $cropy1;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getCropx2()
    {
        return $this->cropx2;
    }

    /**
     * @param int|string $cropx2
     *
     * @return HeatmapConfig
     */
    public function setCropx2($cropx2)
    {
        $this->cropx2 = $cropx2;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getCropy2()
    {
        return $this->cropy2;
    }

    /**
     * @param int|string $cropy2
     *
     * @return HeatmapConfig
     */
    public function setCropy2($cropy2)
    {
        $this->cropy2 = $cropy2;

        return $this;
    }
}
