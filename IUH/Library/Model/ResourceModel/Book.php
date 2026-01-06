<?php
namespace IUH\Library\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Book extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('iuh_book', 'book_id');
    }
}
