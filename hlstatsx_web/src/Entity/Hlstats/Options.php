<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\OptionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsOptions.
 *
 * @ORM\Table(name="hlstats_Options", indexes={@ORM\Index(name="opttype", columns={"opttype"})})
 *
 * @ORM\Entity(repositoryClass=OptionsRepository::class)
 */
class Options
{
    /**
     * @var string
     *
     * @ORM\Column(name="keyname", type="string", length=32, nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $keyname = '';

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=128, nullable=false)
     */
    private $value = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="opttype", type="boolean", nullable=false, options={"default": "1"})
     */
    private $opttype = true;

    public function getKeyname(): string
    {
        return $this->keyname;
    }

    public function setKeyname(string $keyname): Options
    {
        $this->keyname = $keyname;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): Options
    {
        $this->value = $value;

        return $this;
    }

    public function isOpttype(): bool
    {
        return $this->opttype;
    }

    public function setOpttype(bool $opttype): Options
    {
        $this->opttype = $opttype;

        return $this;
    }
}
