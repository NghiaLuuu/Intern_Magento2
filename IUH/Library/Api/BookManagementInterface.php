<?php
namespace IUH\Library\Api;

use IUH\Library\Api\Data\BookInterface;

interface BookManagementInterface
{
    /**
     * @param \IUH\Library\Api\Data\BookInterface $book
     * @return \IUH\Library\Api\Data\BookInterface
     */
    public function create(BookInterface $book);
}
