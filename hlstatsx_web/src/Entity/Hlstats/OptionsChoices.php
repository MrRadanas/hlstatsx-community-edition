<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\OptionsChoicesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsOptionsChoices.
 *
 * @ORM\Table(name="hlstats_Options_Choices", indexes={@ORM\Index(name="keyname", columns={"keyname"})})
 *
 * @ORM\Entity(repositoryClass=OptionsChoicesRepository::class)
 */
class OptionsChoices
{
    /**
     * @var string
     *
     * @ORM\Column(name="keyname", type="string", length=32, nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $keyname;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=128, nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=128, nullable=false)
     */
    private $text = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="isDefault", type="boolean", nullable=false)
     */
    private $isdefault = '0';

    public function getKeyname(): string
    {
        return $this->keyname;
    }

    public function setKeyname(string $keyname): OptionsChoices
    {
        $this->keyname = $keyname;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): OptionsChoices
    {
        $this->value = $value;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): OptionsChoices
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return bool|string
     */
    public function getIsdefault()
    {
        return $this->isdefault;
    }

    /**
     * @param bool|string $isdefault
     *
     * @return OptionsChoices
     */
    public function setIsdefault($isdefault)
    {
        $this->isdefault = $isdefault;

        return $this;
    }
}
