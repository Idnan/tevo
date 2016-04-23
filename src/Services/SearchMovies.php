<?php

namespace Idnan\Tevo\Services;

use Colors\Color;
use Idnan\Tevo\Services\Base\BaseService;
use Idnan\Tevo\Core\Constants\Constant as C;
use Console_Table as ConsoleTable;

/**
 * Class SearchMovies
 *
 * @package Idnan\Tevo\Services
 */
class SearchMovies extends BaseService
{
    /**
     * Search movies by name
     *
     * @param string  $query
     * @param integer $page
     *
     * @author Adnan Ahmed <mahradnan@hotmail.com>
     *
     */
    public function get($query, $page)
    {
        $this->page = $page;

        $response = $this->callApi(C::SEARCH_MOVIES, ['page' => $this->page, 'query' => $query]);

        $this->display($response);
    }

    /**
     * Display results
     *
     * @param $response
     *
     * @return bool
     *
     * @author Adnan Ahmed <mahradnan@hotmail.com>
     *
     */
    public function display($response)
    {
        $movies = !empty($response['results']) ? $response['results'] : [];
        if (empty($movies)) {

            echo '[-] No results found!' . PHP_EOL;

            return true;
        }

        $c = new Color();

        echo $c("Title: \t\t\t" . $movies[0]['original_title'])->red()->bold() . PHP_EOL;
        echo $c("Release Date: \t\t" . $movies[0]['release_date'])->red()->bold() . PHP_EOL;
        echo $c("Popularity: \t\t" . round($movies[0]['popularity'], 1))->red()->bold() . PHP_EOL;
        echo $c("Plot: ")->red()->bold() . PHP_EOL;
        echo $c($movies[0]['overview']) . PHP_EOL;

        return true;
    }
}