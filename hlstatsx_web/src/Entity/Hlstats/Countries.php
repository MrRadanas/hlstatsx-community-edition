<?php

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\CountriesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsCountries.
 *
 * @ORM\Table(name="hlstats_Countries")
 *
 * @ORM\Entity(repositoryClass=CountriesRepository::class)
 */
class Countries
{
    /**
     * @var string
     *
     * @ORM\Column(name="flag", type="string", length=16, nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $flag;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    public function getFlag(): string
    {
        return $this->flag;
    }

    public function setFlag(string $flag): Countries
    {
        $this->flag = $flag;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Countries
    {
        $this->name = $name;

        return $this;
    }
}
