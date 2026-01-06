<?php
namespace IUH\Library\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Author extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('iuh_author', 'author_id');
    }
}
