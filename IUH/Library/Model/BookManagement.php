<?php
namespace IUH\Library\Model;

use IUH\Library\Api\BookManagementInterface;
use IUH\Library\Api\Data\BookInterface;
use IUH\Library\Model\ResourceModel\Book as BookResource;
use IUH\Library\Model\ResourceModel\Book\CollectionFactory;
use IUH\Library\Model\BookFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class BookManagement implements BookManagementInterface
{
    protected $bookResource;
    protected $collectionFactory;
    protected $bookFactory;

    public function __construct(
        BookResource $bookResource,
        CollectionFactory $collectionFactory,
        BookFactory $bookFactory
    ) {
        $this->bookResource = $bookResource;
        $this->collectionFactory = $collectionFactory;
        $this->bookFactory = $bookFactory;
    }

    public function create(BookInterface $book): BookInterface
    {
        $this->bookResource->save($book);
        return $book;
    }

    public function getList(): array
    {
        $collection = $this->collectionFactory->create();
        return $collection->getItems();
    }

    public function getById(int $id): BookInterface
    {
        $book = $this->bookFactory->create();
        $this->bookResource->load($book, $id);

        if (!$book->getId()) {
            throw new NoSuchEntityException(
                __('Book with id "%1" does not exist.', $id)
            );
        }

        return $book;
    }
}
