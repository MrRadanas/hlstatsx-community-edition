<?php

declare(strict_types=1);

namespace App\Entity\Hlstats;

use App\Repository\Hlstats\PlayersAwardsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * HlstatsPlayersAwards.
 *
 * @ORM\Table(name="hlstats_Players_Awards")
 *
 * @ORM\Entity(repositoryClass=PlayersAwardsRepository::class)
 */
class PlayersAwards
{
    /**
     * @var string
     *
     * @ORM\Column(name="game", type="string", length=32, nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $game;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="awardTime", type="date", nullable=false)
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $awardtime;

    /**
     * @var int
     *
     * @ORM\Column(name="awardId", type="integer", nullable=false, options={"unsigned": true})
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $awardid = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="playerId", type="integer", nullable=false, options={"unsigned": true})
     *
     * @ORM\Id
     *
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $playerid = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="count", type="integer", nullable=false, options={"unsigned": true})
     */
    private $count = '0';

    public function getGame(): string
    {
        return $this->game;
    }

    public function setGame(string $game): PlayersAwards
    {
        $this->game = $game;

        return $this;
    }

    public function getAwardtime(): \DateTime
    {
        return $this->awardtime;
    }

    public function setAwardtime(\DateTime $awardtime): PlayersAwards
    {
        $this->awardtime = $awardtime;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getAwardid()
    {
        return $this->awardid;
    }

    /**
     * @param int|string $awardid
     *
     * @return PlayersAwards
     */
    public function setAwardid($awardid)
    {
        $this->awardid = $awardid;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getPlayerid()
    {
        return $this->playerid;
    }

    /**
     * @param int|string $playerid
     *
     * @return PlayersAwards
     */
    public function setPlayerid($playerid)
    {
        $this->playerid = $playerid;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int|string $count
     *
     * @return PlayersAwards
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }
}
