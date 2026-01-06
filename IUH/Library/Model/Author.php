<?php
namespace IUH\Library\Model;

use Magento\Framework\Model\AbstractModel;
use IUH\Library\Api\Data\AuthorInterface;

class Author extends AbstractModel implements AuthorInterface
{
    protected function _construct()
    {
        $this->_init(\IUH\Library\Model\ResourceModel\Author::class);
    }

    public function getId() { return $this->getData('author_id'); }
    public function setId($id) { return $this->setData('author_id', $id); }
    public function getName() { return $this->getData('name'); }
    public function setName($name) { return $this->setData('name', $name); }
}
