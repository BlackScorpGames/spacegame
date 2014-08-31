<?php


namespace SpaceGame\Request;


class MoveToLocationRequest {
    private $userName = '';
    private $targetX = 0;
    private $targetY = 0;

    public function __construct($userName, $targetY, $targetX)
    {
        $this->userName = $userName;
        $this->targetY = $targetY;
        $this->targetX = $targetX;
    }

    /**
     * @return int
     */
    public function getTargetX()
    {
        return $this->targetX;
    }

    /**
     * @return int
     */
    public function getTargetY()
    {
        return $this->targetY;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

} 