<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\ModsDefaultsRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Table(name: 'hlstats_Mods_Defaults')]
#[ORM\Entity(repositoryClass: ModsDefaultsRepository::class)]
class ModsDefaults
{
    #[ManyToOne(targetEntity: ModsSupported::class)]
    #[JoinColumn(name: 'code', referencedColumnName: 'code')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private ModsSupported $code;

    #[ORM\Column(name: 'parameter', type: 'string', length: 50, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private string $parameter;

    #[ORM\Column(name: 'value', type: 'string', length: 128, nullable: false)]
    private string $value;

    public function getCode(): ModsSupported
    {
        return $this->code;
    }

    public function setCode(ModsSupported $code): ModsDefaults
    {
        $this->code = $code;

        return $this;
    }

    public function getParameter(): string
    {
        return $this->parameter;
    }

    public function setParameter(string $parameter): ModsDefaults
    {
        $this->parameter = $parameter;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): ModsDefaults
    {
        $this->value = $value;

        return $this;
    }
}
