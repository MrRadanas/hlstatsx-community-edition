<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsModsSupported.
 *
 * @ORM\Table(name="hlstats_Mods_Supported")
 *
 * @ORM\Entity
 */
class ModsSupported
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=32, nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): ModsSupported
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ModsSupported
    {
        $this->name = $name;

        return $this;
    }
}
