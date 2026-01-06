<?php
namespace Magenest\Movie\Model;

use Magento\Framework\Model\AbstractModel;
use Magenest\Movie\Api\Data\MovieInterface;

class Movie extends AbstractModel implements MovieInterface
{
    protected function _construct()
    {
        $this->_init(\Magenest\Movie\Model\ResourceModel\Movie::class);
    }

    public function getMovieId()
    {
        return $this->getData(self::MOVIE_ID);
    }

    public function setMovieId($id)
    {
        return $this->setData(self::MOVIE_ID, $id);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    public function getRating()
    {
        return $this->getData(self::RATING);
    }

    public function setRating($rating)
    {
        return $this->setData(self::RATING, $rating);
    }

    public function getDirectorId()
    {
        return $this->getData(self::DIRECTOR_ID);
    }

    public function setDirectorId($directorId)
    {
        return $this->setData(self::DIRECTOR_ID, $directorId);
    }
}
