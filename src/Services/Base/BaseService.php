<?php

namespace Idnan\Tevo\Services\Base;

use GuzzleHttp\Client;
use Console_Table as ConsoleTable;
use Idnan\Tevo\Core\Constants\Constant as C;

/**
 * Class BaseService
 */
class BaseService
{
    /**
     * @var integer
     */
    const PAGE_SIZE = 20;

    /**
     * @var integer
     */
    protected $page = 1;

    /**
     * @var mixed
     */
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Get http client
     *
     * @param string $url
     * @param array  $parameters
     *
     * @return array
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    public function callApi($url, $parameters = [])
    {
        $parameters = array_merge($parameters, ['api_key' => $this->getApiKey()]);

        $request = $this->client->request('GET', $url, ['query' => $parameters]);

        $response = $request->getBody()->getContents();

        return $this->transform($response);
    }

    /**
     * Convert json to array
     *
     * @param $response
     *
     * @return array
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    private function transform($response)
    {
        return json_decode($response, true);
    }

    /**
     * Get API Key
     *
     * @return string
     *
     * @author Adnan Ahmed <adnan.ahmed@tajawal.com>
     *
     */
    private function getApiKey()
    {
        return C::API_KEY;
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
                $movie['title'],
                $movie['release_date'],
                round($movie['popularity'], 1),
            ]);
        }

        echo $tbl->getTable();

        return true;
    }
}