<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\RolesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsRoles.
 *
 * @ORM\Table(name="hlstats_Roles", uniqueConstraints={@ORM\UniqueConstraint(name="gamecode", columns={"game", "code"})})
 *
 * @ORM\Entity(repositoryClass=RolesRepository::class)
 */
class Roles
{
    /**
     * @var int
     *
     * @ORM\Column(name="roleId", type="integer", nullable=false, options={"unsigned": true})
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $roleid;

    /**
     * @var string
     *
     * @ORM\Column(name="game", type="string", length=32, nullable=false, options={"default": "valve"})
     */
    private $game = 'valve';

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=64, nullable=false)
     */
    private $code = '';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="hidden", type="string", length=0, nullable=false)
     */
    private $hidden = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="picked", type="integer", nullable=false, options={"unsigned": true})
     */
    private $picked = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="kills", type="integer", nullable=false, options={"unsigned": true})
     */
    private $kills = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="deaths", type="integer", nullable=false, options={"unsigned": true})
     */
    private $deaths = '0';

    public function getRoleid(): int
    {
        return $this->roleid;
    }

    public function setRoleid(int $roleid): Roles
    {
        $this->roleid = $roleid;

        return $this;
    }

    public function getGame(): string
    {
        return $this->game;
    }

    public function setGame(string $game): Roles
    {
        $this->game = $game;

        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): Roles
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Roles
    {
        $this->name = $name;

        return $this;
    }

    public function getHidden(): string
    {
        return $this->hidden;
    }

    public function setHidden(string $hidden): Roles
    {
        $this->hidden = $hidden;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getPicked()
    {
        return $this->picked;
    }

    /**
     * @param int|string $picked
     *
     * @return Roles
     */
    public function setPicked($picked)
    {
        $this->picked = $picked;

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
     * @return Roles
     */
    public function setKills($kills)
    {
        $this->kills = $kills;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getDeaths()
    {
        return $this->deaths;
    }

    /**
     * @param int|string $deaths
     *
     * @return Roles
     */
    public function setDeaths($deaths)
    {
        $this->deaths = $deaths;

        return $this;
    }
}
