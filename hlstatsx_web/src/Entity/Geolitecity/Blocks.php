<?php

declare(strict_types=1);

namespace App\Entity\Geolitecity;

use App\Repository\Geolitecity\BlocksRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Table(name: 'geoLiteCity_Blocks')]
#[ORM\Entity(repositoryClass: BlocksRepository::class)]
class Blocks
{
    #[ORM\Column(name: 'startIpNum', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private string $startipnum = '0';

    #[ORM\Column(name: 'endIpNum', type: 'bigint', nullable: false, options: ['unsigned' => true])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private string $endipnum = '0';

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ManyToOne(targetEntity: Location::class)]
    #[JoinColumn(name: 'locid', referencedColumnName: 'locId')]
    private Location $locid;

    public function getStartipnum(): string
    {
        return $this->startipnum;
    }

    public function setStartipnum(string $startipnum): static
    {
        $this->startipnum = $startipnum;

        return $this;
    }

    public function getEndipnum(): string
    {
        return $this->endipnum;
    }

    public function setEndipnum(string $endipnum): static
    {
        $this->endipnum = $endipnum;

        return $this;
    }

    public function getLocid(): Location
    {
        return $this->locid;
    }

    public function setLocid(Location $location): static
    {
        $this->locid = $location;

        return $this;
    }
}
