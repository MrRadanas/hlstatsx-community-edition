<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\OptionsChoicesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsOptionsChoices.
 */
#[ORM\Table(name: 'hlstats_Options_Choices')]
#[ORM\Index(name: 'keyname', columns: ['keyname'])]
#[ORM\Entity(repositoryClass: OptionsChoicesRepository::class)]
class OptionsChoices
{
    #[ORM\Column(name: 'keyname', type: 'string', length: 32, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private string $keyname;

    #[ORM\Column(name: 'value', type: 'string', length: 128, nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private string $value;

    #[ORM\Column(name: 'text', type: 'string', length: 128, nullable: false, options: ['default' => ''])]
    private string $text = '';

    #[ORM\Column(name: 'isDefault', type: 'boolean', nullable: false, options: ['default' => false])]
    private bool $isdefault = false;

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

    public function isIsdefault(): bool
    {
        return $this->isdefault;
    }

    public function setIsdefault(bool $isdefault): OptionsChoices
    {
        $this->isdefault = $isdefault;

        return $this;
    }
}
