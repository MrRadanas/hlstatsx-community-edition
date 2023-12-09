<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\UsersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsUsers.
 *
 * @ORM\Table(name="hlstats_Users")
 *
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users
{
    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=16, nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $username = '';

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=32, nullable=false)
     */
    private $password = '';

    /**
     * @var int
     *
     * @ORM\Column(name="acclevel", type="integer", nullable=false)
     */
    private $acclevel = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="playerId", type="integer", nullable=false)
     */
    private $playerid = '0';

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): Users
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): Users
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getAcclevel()
    {
        return $this->acclevel;
    }

    /**
     * @param int|string $acclevel
     *
     * @return Users
     */
    public function setAcclevel($acclevel)
    {
        $this->acclevel = $acclevel;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getPlayerid()
    {
        return $this->playerid;
    }

    /**
     * @param int|string $playerid
     *
     * @return Users
     */
    public function setPlayerid($playerid)
    {
        $this->playerid = $playerid;

        return $this;
    }
}
