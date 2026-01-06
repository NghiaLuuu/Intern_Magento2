<?php
namespace IUH\Library\Api;

use IUH\Library\Api\Data\AuthorInterface;

interface AuthorManagementInterface
{
    /**
     * @param \IUH\Library\Api\Data\AuthorInterface $author
     * @return \IUH\Library\Api\Data\AuthorInterface
     */
    public function create(AuthorInterface $author);
}
