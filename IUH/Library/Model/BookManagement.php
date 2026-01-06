<?php
namespace IUH\Library\Model;

use IUH\Library\Api\BookManagementInterface;
use IUH\Library\Api\Data\BookInterface;
use IUH\Library\Model\ResourceModel\Book as BookResource;

class BookManagement implements BookManagementInterface
{
    protected $bookResource;

    public function __construct(BookResource $bookResource)
    {
        $this->bookResource = $bookResource;
    }

    public function create(BookInterface $book)
    {
        $this->bookResource->save($book);
        return $book;
    }
}
