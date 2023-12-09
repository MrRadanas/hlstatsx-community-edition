<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\AwardsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsAwards.
 *
 * @ORM\Table(name="hlstats_Awards", uniqueConstraints={@ORM\UniqueConstraint(name="code", columns={"game", "awardType", "code"})})
 *
 * @ORM\Entity(repositoryClass=AwardsRepository::class)
 */
class Awards
{
    /**
     * @var int
     *
     * @ORM\Column(name="awardId", type="integer", nullable=false, options={"unsigned": true})
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $awardid;

    /**
     * @var string
     *
     * @ORM\Column(name="awardType", type="string", length=1, nullable=false, options={"default": "W", "fixed": true})
     */
    private $awardtype = 'W';

    /**
     * @var string
     *
     * @ORM\Column(name="game", type="string", length=32, nullable=false, options={"default": "valve"})
     */
    private $game = 'valve';

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=128, nullable=false)
     */
    private $code = '';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="verb", type="string", length=128, nullable=false)
     */
    private $verb = '';

    /**
     * @var int|null
     *
     * @ORM\Column(name="d_winner_id", type="integer", nullable=true, options={"unsigned": true})
     */
    private $dWinnerId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="d_winner_count", type="integer", nullable=true, options={"unsigned": true})
     */
    private $dWinnerCount;

    /**
     * @var int|null
     *
     * @ORM\Column(name="g_winner_id", type="integer", nullable=true, options={"unsigned": true})
     */
    private $gWinnerId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="g_winner_count", type="integer", nullable=true, options={"unsigned": true})
     */
    private $gWinnerCount;

    public function getAwardid(): int
    {
        return $this->awardid;
    }

    public function setAwardid(int $awardid): Awards
    {
        $this->awardid = $awardid;

        return $this;
    }

    public function getAwardtype(): string
    {
        return $this->awardtype;
    }

    public function setAwardtype(string $awardtype): Awards
    {
        $this->awardtype = $awardtype;

        return $this;
    }

    public function getGame(): string
    {
        return $this->game;
    }

    public function setGame(string $game): Awards
    {
        $this->game = $game;

        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): Awards
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Awards
    {
        $this->name = $name;

        return $this;
    }

    public function getVerb(): string
    {
        return $this->verb;
    }

    public function setVerb(string $verb): Awards
    {
        $this->verb = $verb;

        return $this;
    }

    public function getDWinnerId(): int
    {
        return $this->dWinnerId;
    }

    public function setDWinnerId(int $dWinnerId): Awards
    {
        $this->dWinnerId = $dWinnerId;

        return $this;
    }

    public function getDWinnerCount(): int
    {
        return $this->dWinnerCount;
    }

    public function setDWinnerCount(int $dWinnerCount): Awards
    {
        $this->dWinnerCount = $dWinnerCount;

        return $this;
    }

    public function getGWinnerId(): int
    {
        return $this->gWinnerId;
    }

    public function setGWinnerId(int $gWinnerId): Awards
    {
        $this->gWinnerId = $gWinnerId;

        return $this;
    }

    public function getGWinnerCount(): int
    {
        return $this->gWinnerCount;
    }

    public function setGWinnerCount(int $gWinnerCount): Awards
    {
        $this->gWinnerCount = $gWinnerCount;

        return $this;
    }
}
