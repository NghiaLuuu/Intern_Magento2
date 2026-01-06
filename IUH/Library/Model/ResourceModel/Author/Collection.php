<?php
namespace IUH\Library\Model\ResourceModel\Author;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use IUH\Library\Model\Author;
use IUH\Library\Model\ResourceModel\Author as AuthorResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'author_id';

    protected function _construct()
    {
        $this->_init(Author::class, AuthorResource::class);
    }
}
