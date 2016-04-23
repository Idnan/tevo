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
     * Get trending movies/series
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function getTrending()
    {
        $this->tevo->getTrending();
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
}