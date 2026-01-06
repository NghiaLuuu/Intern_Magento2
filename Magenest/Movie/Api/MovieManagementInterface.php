<?php
namespace Magenest\Movie\Api;

use Magenest\Movie\Api\Data\MovieInterface;

interface MovieManagementInterface
{
    /**
     * Create movie
     *
     * @param MovieInterface $movie
     * @return MovieInterface
     */
    public function create(MovieInterface $movie);
}
