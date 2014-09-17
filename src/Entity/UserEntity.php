<?php namespace SpaceGame\Entity;

/**
 * Class UserEntity
 * @package SpaceGame\Entity
 */
class UserEntity {

    /**
     * Contains id from user
     *
     * @var int
     */
    private $userId;

    /**
     * Contains username
     *
     * @var string
     */
    private $userName;


    /**
     * Initilize class and create user
     *
     * @param $userId
     * @param $userName
     */
    public function __construct($userId, $userName)
    {
        $this->userId = (int)$userId;
        $this->userName = $userName;
    }

    /**
     * Return id from user
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Retun username
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

} 