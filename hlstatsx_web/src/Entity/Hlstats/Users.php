<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\UsersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'hlstats_Users')]
#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Column(name: 'username', type: 'string', length: 16, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private string $username;

    #[ORM\Column(name: 'password', type: 'string', length: 32, nullable: false)]
    private string $password;

    #[ORM\Column(name: 'acclevel', type: 'integer', nullable: false)]
    private int $acclevel;

    #[ORM\Column(name: 'playerId', type: 'integer', nullable: false)]
    private int $playerid;

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

    public function getAcclevel(): int
    {
        return $this->acclevel;
    }

    public function setAcclevel(int $acclevel): Users
    {
        $this->acclevel = $acclevel;

        return $this;
    }

    public function getPlayerid(): int
    {
        return $this->playerid;
    }

    public function setPlayerid(int $playerid): Users
    {
        $this->playerid = $playerid;

        return $this;
    }
}
