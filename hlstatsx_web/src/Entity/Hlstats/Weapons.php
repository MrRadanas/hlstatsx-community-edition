<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\WeaponsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsWeapons.
 */
#[ORM\Table(name: 'hlstats_Weapons')]
#[ORM\Index(name: 'code', columns: ['code'])]
#[ORM\Index(name: 'modifier', columns: ['modifier'])]
#[ORM\UniqueConstraint(name: 'gamecode', columns: ['game', 'code'])]
#[ORM\Entity(repositoryClass: WeaponsRepository::class)]
class Weapons
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'weaponId', type: 'integer', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    private $weaponid;

    /**
     * @var string
     */
    #[ORM\Column(name: 'game', type: 'string', length: 32, nullable: false, options: ['default' => 'valve'])]
    private $game = 'valve';

    /**
     * @var string
     */
    #[ORM\Column(name: 'code', type: 'string', length: 64, nullable: false)]
    private $code = '';

    /**
     * @var string
     */
    #[ORM\Column(name: 'name', type: 'string', length: 128, nullable: false)]
    private $name = '';

    /**
     * @var float
     */
    #[ORM\Column(name: 'modifier', type: 'float', precision: 10, scale: 2, nullable: false, options: ['default' => '1.00'])]
    private $modifier = 1.00;

    /**
     * @var int
     */
    #[ORM\Column(name: 'kills', type: 'integer', nullable: false, options: ['unsigned' => true])]
    private $kills = '0';

    /**
     * @var int
     */
    #[ORM\Column(name: 'headshots', type: 'integer', nullable: false, options: ['unsigned' => true])]
    private $headshots = '0';

    public function getWeaponid(): int
    {
        return $this->weaponid;
    }

    public function setWeaponid(int $weaponid): Weapons
    {
        $this->weaponid = $weaponid;

        return $this;
    }

    public function getGame(): string
    {
        return $this->game;
    }

    public function setGame(string $game): Weapons
    {
        $this->game = $game;

        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): Weapons
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Weapons
    {
        $this->name = $name;

        return $this;
    }

    public function getModifier(): float
    {
        return $this->modifier;
    }

    public function setModifier(float $modifier): Weapons
    {
        $this->modifier = $modifier;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getKills()
    {
        return $this->kills;
    }

    /**
     * @param int|string $kills
     *
     * @return Weapons
     */
    public function setKills($kills)
    {
        $this->kills = $kills;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getHeadshots()
    {
        return $this->headshots;
    }

    /**
     * @param int|string $headshots
     *
     * @return Weapons
     */
    public function setHeadshots($headshots)
    {
        $this->headshots = $headshots;

        return $this;
    }
}
