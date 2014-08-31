<?php


namespace SpaceGame\Entity;


class UserEntity {
    private $userId;
    private $userName;

    public function __construct($userId, $userName)
    {
        $this->userId = (int)$userId;
        $this->userName = $userName;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

} 