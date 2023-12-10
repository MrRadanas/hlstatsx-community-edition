<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\HeatmapConfigRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Table(name: 'hlstats_Heatmap_Config')]
#[ORM\UniqueConstraint(name: 'gamemap', columns: ['map', 'game'])]
#[ORM\Entity(repositoryClass: HeatmapConfigRepository::class)]
class HeatmapConfig
{
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[ORM\Column(name: 'map', type: 'string', length: 64, nullable: false)]
    private string $map;

    #[ManyToOne(targetEntity: Games::class)]
    #[JoinColumn(name: 'game', referencedColumnName: 'code')]
    private Games $game;

    #[ORM\Column(name: 'xoffset', type: 'float', precision: 10, scale: 0, nullable: false)]
    private float $xoffset;

    #[ORM\Column(name: 'yoffset', type: 'float', precision: 10, scale: 0, nullable: false)]
    private float $yoffset;

    #[ORM\Column(name: 'flipx', type: 'boolean', nullable: false, options: ['default' => false])]
    private bool $flipx = false;

    #[ORM\Column(name: 'flipy', type: 'boolean', nullable: false, options: ['default' => true])]
    private bool $flipy = true;

    #[ORM\Column(name: 'rotate', type: 'boolean', nullable: false, options: ['default' => false])]
    private bool $rotate = false;

    #[ORM\Column(name: 'days', type: 'smallint', nullable: false, options: ['default' => 30])]
    private int $days = 30;

    #[ORM\Column(name: 'brush', type: 'string', length: 5, nullable: false, options: ['default' => 'small'])]
    private string $brush = 'small';

    #[ORM\Column(name: 'scale', type: 'float', precision: 10, scale: 0, nullable: false)]
    private float $scale;

    #[ORM\Column(name: 'font', type: 'smallint', nullable: false, options: ['default' => 10])]
    private int $font = 10;

    #[ORM\Column(name: 'thumbw', type: 'float', precision: 10, scale: 0, nullable: false, options: ['default' => 0.170312])]
    private float $thumbw = 0.170312;

    #[ORM\Column(name: 'thumbh', type: 'float', precision: 10, scale: 0, nullable: false, options: ['default' => 0.170312])]
    private float $thumbh = 0.170312;

    #[ORM\Column(name: 'cropx1', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $cropx1 = 0;

    #[ORM\Column(name: 'cropy1', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $cropy1 = 0;

    #[ORM\Column(name: 'cropx2', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $cropx2 = 0;

    #[ORM\Column(name: 'cropy2', type: 'integer', nullable: false, options: ['default' => 0])]
    private int $cropy2 = 0;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getMap(): string
    {
        return $this->map;
    }

    public function setMap(string $map): static
    {
        $this->map = $map;

        return $this;
    }

    public function getGame(): Games
    {
        return $this->game;
    }

    public function setGame(Games $game): static
    {
        $this->game = $game;

        return $this;
    }

    public function getXoffset(): float
    {
        return $this->xoffset;
    }

    public function setXoffset(float $xoffset): static
    {
        $this->xoffset = $xoffset;

        return $this;
    }

    public function getYoffset(): float
    {
        return $this->yoffset;
    }

    public function setYoffset(float $yoffset): static
    {
        $this->yoffset = $yoffset;

        return $this;
    }

    public function getFlipx(): bool
    {
        return $this->flipx;
    }

    public function setFlipx(bool $flipx): static
    {
        $this->flipx = $flipx;

        return $this;
    }

    public function isFlipy(): bool
    {
        return $this->flipy;
    }

    public function setFlipy(bool $flipy): static
    {
        $this->flipy = $flipy;

        return $this;
    }

    public function getRotate(): bool
    {
        return $this->rotate;
    }

    public function setRotate(bool $rotate): static
    {
        $this->rotate = $rotate;

        return $this;
    }

    public function getDays(): int
    {
        return $this->days;
    }

    public function setDays(int $days): static
    {
        $this->days = $days;

        return $this;
    }

    public function getBrush(): string
    {
        return $this->brush;
    }

    public function setBrush(string $brush): static
    {
        $this->brush = $brush;

        return $this;
    }

    public function getScale(): float
    {
        return $this->scale;
    }

    public function setScale(float $scale): static
    {
        $this->scale = $scale;

        return $this;
    }

    public function getFont(): int
    {
        return $this->font;
    }

    public function setFont(int $font): static
    {
        $this->font = $font;

        return $this;
    }

    public function getThumbw(): float
    {
        return $this->thumbw;
    }

    public function setThumbw(float $thumbw): static
    {
        $this->thumbw = $thumbw;

        return $this;
    }

    public function getThumbh(): float
    {
        return $this->thumbh;
    }

    public function setThumbh(float $thumbh): static
    {
        $this->thumbh = $thumbh;

        return $this;
    }

    public function getCropx1(): int
    {
        return $this->cropx1;
    }

    public function setCropx1(int $cropx1): static
    {
        $this->cropx1 = $cropx1;

        return $this;
    }

    public function getCropy1(): int
    {
        return $this->cropy1;
    }

    public function setCropy1(int $cropy1): static
    {
        $this->cropy1 = $cropy1;

        return $this;
    }

    public function getCropx2(): int
    {
        return $this->cropx2;
    }

    public function setCropx2(int $cropx2): static
    {
        $this->cropx2 = $cropx2;

        return $this;
    }

    public function getCropy2(): int
    {
        return $this->cropy2;
    }

    public function setCropy2(int $cropy2): static
    {
        $this->cropy2 = $cropy2;

        return $this;
    }
}
