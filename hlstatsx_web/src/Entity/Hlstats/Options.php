<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\OptionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'hlstats_Options')]
#[ORM\Index(name: 'opttype', columns: ['opttype'])]
#[ORM\Entity(repositoryClass: OptionsRepository::class)]
class Options
{
    #[ORM\Column(name: 'keyname', type: 'string', length: 32, nullable: false, options: ['default' => ''])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private string $keyname = '';

    #[ORM\Column(name: 'value', type: 'string', length: 128, nullable: false, options: ['default' => ''])]
    private string $value = '';

    #[ORM\Column(name: 'opttype', type: 'smallint', nullable: false, options: ['default' => 1])]
    private int $opttype = 1;

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

    public function isOpttype(): int
    {
        return $this->opttype;
    }

    public function setOpttype(int $opttype): Options
    {
        $this->opttype = $opttype;

        return $this;
    }
}
