<?php

namespace Idnan\Tevo\Services;

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
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
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
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function display($response)
    {
        $movies = !empty($response['results']) ? $response['results'] : [];
        if (empty($movies)) {

            echo '[-] No results found!' . PHP_EOL;

            return true;
        }

        // set header
        $tbl = new ConsoleTable();
        $tbl->setHeaders([
            'Sr#',
            'Title',
            'Release Date',
            'Popularity',
        ]);

        // set rows
        foreach ($movies as $index => $movie) {

            $tbl->addRow([
                (($index + 1) + (($this->page - 1) * static::PAGE_SIZE)),
                $movie['original_title'],
                $movie['release_date'],
                round($movie['popularity'], 1),
            ]);
        }

        echo $tbl->getTable();

        return true;
    }
}