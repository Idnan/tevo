<?php

namespace Idnan\Tevo;

use Idnan\Tevo\Core\Base\BaseInterface;
use Idnan\Tevo\Services\TopRatedMovies;
use Idnan\Tevo\Services\UpcomingMovies;
use Idnan\Tevo\Services\PopularMovies;

/**
 * Class Movies
 *
 * @package Idnan\Tevo
 */
class Movies implements BaseInterface
{
    /**
     * @var integer
     */
    protected $page;

    public function __construct($page = 1)
    {
        $this->page = $page;
    }

    /**
     * Get the list of upcoming movies by release date. This list refreshes every day.
     *
     * @return void
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getUpcoming()
    {
        (new UpcomingMovies())->get($this->page);
    }

    /**
     * Get trending movies
     *
     * @return void
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getTopRated()
    {
        (new TopRatedMovies())->get($this->page);
    }

    /**
     * Get popular movies
     *
     * @return void
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getPopular()
    {
        (new PopularMovies())->get($this->page);
    }
}