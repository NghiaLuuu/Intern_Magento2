<?php
namespace Magenest\Movie\Api\Data;

interface MovieInterface
{
    const MOVIE_ID    = 'movie_id';
    const NAME        = 'name';
    const DESCRIPTION = 'description';
    const RATING      = 'rating';
    const DIRECTOR_ID = 'director_id';

    public function getMovieId();
    public function setMovieId($id);

    public function getName();
    public function setName($name);

    public function getDescription();
    public function setDescription($description);

    public function getRating();
    public function setRating($rating);

    public function getDirectorId();
    public function setDirectorId($directorId);
}
