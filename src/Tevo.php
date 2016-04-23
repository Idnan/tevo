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
     * Get top rated movies
     *
     * @author Adnan Ahmed <mahradnan@hotmail.com>
     *
     */
    public function getTopRated()
    {
        $this->tevo->getTopRated();
    }

    /**
     * Get upcoming movies
     *
     * @author Adnan Ahmed <mahradnan@hotmail.com>
     *
     */
    public function getUpcoming()
    {
        $this->tevo->getUpcoming();
    }

    /**
     * Get popular movies
     *
     * @author Adnan Ahmed <mahradnan@hotmail.com>
     *
     */
    public function getPopular()
    {
        $this->tevo->getPopular();
    }

    /**
     * Get now playing movies
     *
     * @author Adnan Ahmed <mahradnan@hotmail.com>
     *
     */
    public function getNowPlaying()
    {
        $this->tevo->getNowPlaying();
    }

    /**
     * Search movies
     *
     * @param string $query
     *
     * @author Adnan Ahmed <mahradnan@hotmail.com>
     *
     */
    public function search($query)
    {
        $this->tevo->search($query);
    }
}