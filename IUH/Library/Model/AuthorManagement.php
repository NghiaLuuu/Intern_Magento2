<?php
namespace IUH\Library\Model;

use IUH\Library\Api\AuthorManagementInterface;
use IUH\Library\Model\AuthorFactory;
use IUH\Library\Model\ResourceModel\Author as AuthorResource;

class AuthorManagement implements AuthorManagementInterface
{
    protected $authorFactory;
    protected $authorResource;

    public function __construct(
        AuthorFactory $authorFactory,
        AuthorResource $authorResource
    ) {
        $this->authorFactory = $authorFactory;
        $this->authorResource = $authorResource;
    }

    public function create($author)
    {
        $authorModel = $this->authorFactory->create();
        $authorModel->setName($author['name']);
        $this->authorResource->save($authorModel);
        return $authorModel;
    }
}
