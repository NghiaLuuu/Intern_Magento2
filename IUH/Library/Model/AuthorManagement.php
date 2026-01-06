<?php
namespace IUH\Library\Model;

use IUH\Library\Api\AuthorManagementInterface;
use IUH\Library\Api\Data\AuthorInterface;
use IUH\Library\Model\ResourceModel\Author as AuthorResource;

class AuthorManagement implements AuthorManagementInterface
{
    protected $authorResource;

    public function __construct(AuthorResource $authorResource)
    {
        $this->authorResource = $authorResource;
    }

    public function create(AuthorInterface $author)
    {
        $this->authorResource->save($author);
        return $author;
    }
}
