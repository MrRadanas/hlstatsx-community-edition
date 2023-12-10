<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\ServersConfigRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Table(name: 'hlstats_Servers_Config')]
#[ORM\Index(name: 'serverConfigId', columns: ['serverConfigId'])]
#[ORM\Entity(repositoryClass: ServersConfigRepository::class)]
class ServersConfig
{
    #[ORM\Column(name: 'parameter', type: 'string', length: 50, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private string $parameter;

    #[ManyToOne(targetEntity: Servers::class)]
    #[JoinColumn(name: 'serverId', referencedColumnName: 'serverId', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private Servers $serverid;

    #[ORM\Column(name: 'value', type: 'string', length: 128, nullable: false)]
    private string $value;

    #[ORM\Column(name: 'serverConfigId', type: 'integer', nullable: false, options: ['unsigned' => true])]
    private int $serverconfigid;

    public function getParameter(): string
    {
        return $this->parameter;
    }

    public function setParameter(string $parameter): static
    {
        $this->parameter = $parameter;

        return $this;
    }

    public function getServerid(): Servers
    {
        return $this->serverid;
    }

    public function setServerid(Servers $serverid): static
    {
        $this->serverid = $serverid;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function getServerconfigid(): int
    {
        return $this->serverconfigid;
    }

    public function setServerconfigid(int $serverconfigid): static
    {
        $this->serverconfigid = $serverconfigid;

        return $this;
    }
}
