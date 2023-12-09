<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\ServersVoicecommRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsServersVoicecomm.
 *
 * @ORM\Table(name="hlstats_Servers_VoiceComm", uniqueConstraints={@ORM\UniqueConstraint(name="address", columns={"addr", "UDPPort", "queryPort"})})
 *
 * @ORM\Entity(repositoryClass=ServersVoicecommRepository::class)
 */
class ServersVoicecomm
{
    /**
     * @var int
     *
     * @ORM\Column(name="serverId", type="integer", nullable=false, options={"unsigned": true})
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $serverid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="addr", type="string", length=128, nullable=false)
     */
    private $addr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=128, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descr", type="string", length=255, nullable=true)
     */
    private $descr;

    /**
     * @var int
     *
     * @ORM\Column(name="queryPort", type="integer", nullable=false, options={"default": "51234", "unsigned": true})
     */
    private $queryport = 51234;

    /**
     * @var int
     *
     * @ORM\Column(name="UDPPort", type="integer", nullable=false, options={"default": "8767", "unsigned": true})
     */
    private $udpport = 8767;

    /**
     * @var bool
     *
     * @ORM\Column(name="serverType", type="boolean", nullable=false)
     */
    private $servertype = '0';

    public function getServerid(): int
    {
        return $this->serverid;
    }

    public function setServerid(int $serverid): ServersVoicecomm
    {
        $this->serverid = $serverid;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ServersVoicecomm
    {
        $this->name = $name;

        return $this;
    }

    public function getAddr(): string
    {
        return $this->addr;
    }

    public function setAddr(string $addr): ServersVoicecomm
    {
        $this->addr = $addr;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): ServersVoicecomm
    {
        $this->password = $password;

        return $this;
    }

    public function getDescr(): string
    {
        return $this->descr;
    }

    public function setDescr(string $descr): ServersVoicecomm
    {
        $this->descr = $descr;

        return $this;
    }

    public function getQueryport(): int
    {
        return $this->queryport;
    }

    public function setQueryport(int $queryport): ServersVoicecomm
    {
        $this->queryport = $queryport;

        return $this;
    }

    public function getUdpport(): int
    {
        return $this->udpport;
    }

    public function setUdpport(int $udpport): ServersVoicecomm
    {
        $this->udpport = $udpport;

        return $this;
    }

    /**
     * @return bool|string
     */
    public function getServertype()
    {
        return $this->servertype;
    }

    /**
     * @param bool|string $servertype
     *
     * @return ServersVoicecomm
     */
    public function setServertype($servertype)
    {
        $this->servertype = $servertype;

        return $this;
    }
}
