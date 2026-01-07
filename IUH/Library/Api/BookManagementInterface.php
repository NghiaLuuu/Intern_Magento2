<?php
namespace IUH\Library\Api;

use IUH\Library\Api\Data\BookInterface;
use Magento\Framework\Exception\NoSuchEntityException;

interface BookManagementInterface
{
    /**
     * Create a new book
     *
     * @param \IUH\Library\Api\Data\BookInterface $book
     * @return \IUH\Library\Api\Data\BookInterface
     */
    public function create(BookInterface $book): BookInterface;

    /**
     * Get list of all books
     *
     * @return \IUH\Library\Api\Data\BookInterface[]
     */
    public function getList(): array;

    /**
     * Get book by ID
     *
     * @param int $id
     * @return \IUH\Library\Api\Data\BookInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById(int $id): BookInterface;
}
