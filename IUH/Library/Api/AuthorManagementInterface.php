<?php
namespace IUH\Library\Api;

use IUH\Library\Api\Data\AuthorInterface;

interface AuthorManagementInterface
{
    /**
     * @param mixed $author
     * @return AuthorInterface
     */
    public function create($author);
}
