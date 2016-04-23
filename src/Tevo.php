<?php

namespace Idnan\Tevo;

use Idnan\Tevo\Core\Base\BaseInterface;

/**
 * Class Tevo
 *
 * @package Idnan\Tevo
 */
class Tevo
{
    /**
     * @var \Idnan\Tevo\Core\Base\BaseInterface
     */
    protected $tevo;

    public function __construct(BaseInterface $tevo)
    {
        $this->tevo = $tevo;
    }

    /**
     * Get top rated movies/series
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getTopRated()
    {
        $this->tevo->getTopRated();
    }

    /**
     * Get upcoming movies/series
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getUpcoming()
    {
        $this->tevo->getUpcoming();
    }

    /**
     * Get popular movies/series
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getPopular()
    {
        $this->tevo->getPopular();
    }

    /**
     * Get now playing movies/series
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getNowPlaying()
    {
        $this->tevo->getNowPlaying();
    }
}