<?php
namespace IUH\Library\Model\ResourceModel\Book;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use IUH\Library\Model\Book;
use IUH\Library\Model\ResourceModel\Book as BookResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'book_id';

    protected function _construct()
    {
        $this->_init(Book::class, BookResource::class);
    }
}
