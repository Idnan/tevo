<?php

namespace Idnan\Tevo\Core\Base;

interface BaseInterface
{
    /**
     * Return top rated movies
     *
     * @return void
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getTopRated();

    /**
     * Get upcoming movies
     *
     * @return void
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getUpcoming();

    /**
     * Get popular movies
     *
     * @return void
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getPopular();

    /**
     * Get now playing movies
     *
     * @return void
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getNowPlaying();

    /**
     * Search movies by name
     *
     * @param string $query
     *
     * @return void
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function search($query);
}