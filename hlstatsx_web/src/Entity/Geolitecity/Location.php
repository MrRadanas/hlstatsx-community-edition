<?php

declare(strict_types=1);

namespace App\Entity\Geolitecity;

use App\Repository\Geolitecity\LocationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * GeolitecityLocation.
 *
 * @ORM\Table(name="geoLiteCity_Location")
 *
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
{
    /**
     * @ORM\Column(name="locId", type="bigint", nullable=false, options={"unsigned": true})
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private string $locid = '0';

    /**
     * @ORM\Column(name="country", type="string", length=2, nullable=false)
     */
    private string $country;

    /**
     * @ORM\Column(name="region", type="string", length=50, nullable=true)
     */
    private ?string $region;

    /**
     * @ORM\Column(name="city", type="string", length=50, nullable=true)
     */
    private ?string $city;

    /**
     * @ORM\Column(name="postalCode", type="string", length=10, nullable=true)
     */
    private ?string $postalcode;

    /**
     * @ORM\Column(name="latitude", type="decimal", precision=14, scale=4, nullable=true)
     */
    private ?string $latitude;

    /**
     * @ORM\Column(name="longitude", type="decimal", precision=14, scale=4, nullable=true)
     */
    private ?string $longitude;

    public function getLocid(): string
    {
        return $this->locid;
    }

    public function setLocid(string $locid): Location
    {
        $this->locid = $locid;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): Location
    {
        $this->country = $country;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): Location
    {
        $this->region = $region;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): Location
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalcode(): ?string
    {
        return $this->postalcode;
    }

    public function setPostalcode(string $postalcode): Location
    {
        $this->postalcode = $postalcode;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): Location
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): Location
    {
        $this->longitude = $longitude;

        return $this;
    }
}
