<?php

namespace Idnan\Tevo\Core\Base;

interface BaseInterface
{
    /**
     * Return top rated movies/series
     *
     * @return void
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getTopRated();

    /**
     * Get upcoming movies/series
     *
     * @return void
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getUpcoming();

    /**
     * Get popular movies/series
     *
     * @return void
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getPopular();

    /**
     * Get now playing movies/series
     *
     * @return void
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getNowPlaying();

}