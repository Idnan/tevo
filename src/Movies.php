<?php

namespace Idnan\Tevo;

use Idnan\Tevo\Core\Base\BaseInterface;

/**
 * Class Movies
 *
 * @package Idnan\Tevo
 */
class Movies implements BaseInterface
{
    /**
     * Get upcoming movies
     *
     * @return array
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getUpcoming()
    {
        return [];
    }

    /**
     * Get trending movies
     *
     * @return array
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getTrending()
    {
        return [];
    }
}