<?php

namespace Idnan\Tevo\Services;

use Idnan\Tevo\Core\Constants\Constant as C;
use Idnan\Tevo\Services\Base\BaseService;

/**
 * Class TopRatedMovies
 *
 * @package Idnan\Tevo\Services
 */
class TopRatedMovies extends BaseService
{
    /**
     * Get top rated movies
     *
     * @param integer $page
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function get($page)
    {
        $this->page = $page;

        $response = $this->callApi(C::TOP_RATED_MOVIES, ['page' => $this->page]);

        $this->display($response);
    }
}