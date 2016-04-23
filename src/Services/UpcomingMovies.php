<?php

namespace Idnan\Tevo\Services;

use Idnan\Tevo\Core\Constants\Constant as C;
use Idnan\Tevo\Services\Base\BaseService;

/**
 * Class UpcomingMovies
 */
class UpcomingMovies extends BaseService
{

    /**
     * Get upcoming movies
     *
     * @param integer $page
     *
     * @author Adnan Ahmed <mahradnan@hotmail.com>
     *
     */
    public function get($page)
    {
        $this->page = $page;

        $response = $this->callApi(C::UPCOMING_MOVIES, ['page' => $this->page]);

        $this->display($response);
    }
}