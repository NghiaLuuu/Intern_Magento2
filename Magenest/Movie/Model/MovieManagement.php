<?php
namespace Magenest\Movie\Model;

use Magenest\Movie\Api\MovieManagementInterface;
use Magenest\Movie\Api\Data\MovieInterface;
use Magenest\Movie\Model\MovieFactory;

class MovieManagement implements MovieManagementInterface
{
    protected $movieFactory;

    public function __construct(
        MovieFactory $movieFactory
    ) {
        $this->movieFactory = $movieFactory;
    }
    public function create(MovieInterface $movie)
    {
        $model = $this->movieFactory->create();

        $model->setName($movie->getName());
        $model->setDescription($movie->getDescription());
        $model->setRating($movie->getRating());
        $model->setDirectorId($movie->getDirectorId());
        $model->save();
        return $model;
    }
}
