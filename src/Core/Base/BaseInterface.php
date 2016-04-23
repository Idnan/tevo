<?php

namespace Idnan\Tevo\Core\Base;

interface BaseInterface
{
    /**
     * Return trending movies/series
     *
     * @return mixed
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getTrending();

    /**
     * Get upcoming movies/series
     *
     * @return mixed
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getUpcoming();

}