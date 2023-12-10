<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\ServersConfigRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsServersConfig.
 */
#[ORM\Table(name: 'hlstats_Servers_Config')]
#[ORM\Index(name: 'serverConfigId', columns: ['serverConfigId'])]
#[ORM\Entity(repositoryClass: ServersConfigRepository::class)]
class ServersConfig
{
    /**
     * @var string
     */
    #[ORM\Column(name: 'parameter', type: 'string', length: 50, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private $parameter;

    /**
     * @var int
     */
    #[ORM\Column(name: 'serverId', type: 'integer', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private $serverid = '0';

    /**
     * @var string
     */
    #[ORM\Column(name: 'value', type: 'string', length: 128, nullable: false)]
    private $value;

    /**
     * @var int
     */
    #[ORM\Column(name: 'serverConfigId', type: 'integer', nullable: false, options: ['unsigned' => true])]
    private $serverconfigid;

    public function getParameter(): string
    {
        return $this->parameter;
    }

    public function setParameter(string $parameter): ServersConfig
    {
        $this->parameter = $parameter;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getServerid()
    {
        return $this->serverid;
    }

    /**
     * @param int|string $serverid
     *
     * @return ServersConfig
     */
    public function setServerid($serverid)
    {
        $this->serverid = $serverid;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): ServersConfig
    {
        $this->value = $value;

        return $this;
    }

    public function getServerconfigid(): int
    {
        return $this->serverconfigid;
    }

    public function setServerconfigid(int $serverconfigid): ServersConfig
    {
        $this->serverconfigid = $serverconfigid;

        return $this;
    }
}
