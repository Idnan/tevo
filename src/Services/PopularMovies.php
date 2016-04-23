<?php

namespace Idnan\Tevo\Services;

use Idnan\Tevo\Core\Constants\Constant as C;
use Idnan\Tevo\Services\Base\BaseService;

/**
 * Class PopularMovies
 *
 * @package Idnan\Tevo\Services
 */
class PopularMovies extends BaseService
{
    /**
     * Get top rated movies
     *
     * @param integer $page
     *
     * @author Adnan Ahmed <mahradnan@hotmail.com>
     *
     */
    public function get($page)
    {
        $this->page = $page;

        $response = $this->callApi(C::POPULAR_MOVIES, ['page' => $this->page]);

        $this->display($response);
    }
}