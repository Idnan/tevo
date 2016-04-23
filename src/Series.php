<?php

namespace Idnan\Tevo;

use Idnan\Tevo\Core\Base\BaseInterface;

/**
 * Class Series
 *
 * @package Idnan\Tevo
 */
class Series implements BaseInterface
{
    /**
     * Get upcoming series
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
     * Get trending series
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