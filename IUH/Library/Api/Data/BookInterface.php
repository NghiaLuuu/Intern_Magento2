<?php
namespace IUH\Library\Api\Data;

interface BookInterface
{
    /**
     * @return int|null
     */
    public function getId();

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * @return string|null
     */
    public function getTitle();

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * @return string|null
     */
    public function getDescription();

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * @return int|null
     */
    public function getRating();

    /**
     * @param int $rating
     * @return $this
     */
    public function setRating($rating);

    /**
     * @return int|null
     */
    public function getAuthorId();

    /**
     * @param int $authorId
     * @return $this
     */
    public function setAuthorId($authorId);
}
