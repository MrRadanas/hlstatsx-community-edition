<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\ModsDefaultsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsModsDefaults.
 *
 * @ORM\Table(name="hlstats_Mods_Defaults")
 *
 * @ORM\Entity(repositoryClass=ModsDefaultsRepository::class)
 */
class ModsDefaults
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=32, nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="parameter", type="string", length=50, nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $parameter;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=128, nullable=false)
     */
    private $value;

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): ModsDefaults
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
