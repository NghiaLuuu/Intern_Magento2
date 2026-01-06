<?php
namespace IUH\Library\Model;

use Magento\Framework\Model\AbstractModel;
use IUH\Library\Api\Data\BookInterface;

class Book extends AbstractModel implements BookInterface
{
    protected function _construct()
    {
        $this->_init(\IUH\Library\Model\ResourceModel\Book::class);
    }

    public function getId() { return $this->getData('book_id'); }
    public function setId($id) { return $this->setData('book_id', $id); }
    public function getTitle() { return $this->getData('title'); }
    public function setTitle($title) { return $this->setData('title', $title); }
    public function getDescription() { return $this->getData('description'); }
    public function setDescription($desc) { return $this->setData('description', $desc); }
    public function getRating() { return $this->getData('rating'); }
    public function setRating($rating) { return $this->setData('rating', $rating); }
    public function getAuthorId() { return $this->getData('author_id'); }
    public function setAuthorId($id) { return $this->setData('author_id', $id); }
}
