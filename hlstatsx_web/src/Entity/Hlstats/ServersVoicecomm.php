<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\ServersVoicecommRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

#[ORM\Table(name: 'hlstats_Servers_VoiceComm')]
#[ORM\UniqueConstraint(name: 'address', columns: ['addr', 'UDPPort', 'queryPort'])]
#[ORM\Entity(repositoryClass: ServersVoicecommRepository::class)]
class ServersVoicecomm
{
    #[ORM\OneToOne(targetEntity: Servers::class)]
    #[JoinColumn(name: 'serverId', referencedColumnName: 'serverId', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private Servers $serverid;

    #[ORM\Column(name: 'name', type: 'string', length: 128, nullable: false)]
    private string $name;

    #[ORM\Column(name: 'addr', type: 'string', length: 128, nullable: false)]
    private string $addr;

    #[ORM\Column(name: 'password', type: 'string', length: 128, nullable: true)]
    private ?string $password;

    #[ORM\Column(name: 'descr', type: 'string', length: 255, nullable: true)]
    private ?string $descr;

    #[ORM\Column(name: 'queryPort', type: 'integer', nullable: false, options: ['default' => 51234, 'unsigned' => true])]
    private int $queryport = 51234;

    #[ORM\Column(name: 'UDPPort', type: 'integer', nullable: false, options: ['default' => 8767, 'unsigned' => true])]
    private int $udpport = 8767;

    #[ORM\Column(name: 'serverType', type: 'smallint', nullable: false, options: ['default' => 8767])]
    private int $servertype = 0;

    public function getServerid(): Servers
    {
        return $this->serverid;
    }

    public function setServerid(Servers $serverid): static
    {
        $this->serverid = $serverid;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAddr(): string
    {
        return $this->addr;
    }

    public function setAddr(string $addr): static
    {
        $this->addr = $addr;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getDescr(): ?string
    {
        return $this->descr;
    }

    public function setDescr(?string $descr): static
    {
        $this->descr = $descr;

        return $this;
    }

    public function getQueryport(): int
    {
        return $this->queryport;
    }

    public function setQueryport(int $queryport): static
    {
        $this->queryport = $queryport;

        return $this;
    }

    public function getUdpport(): int
    {
        return $this->udpport;
    }

    public function setUdpport(int $udpport): static
    {
        $this->udpport = $udpport;

        return $this;
    }

    public function getServertype(): int
    {
        return $this->servertype;
    }

    public function setServertype(int $servertype): static
    {
        $this->servertype = $servertype;

        return $this;
    }
}
