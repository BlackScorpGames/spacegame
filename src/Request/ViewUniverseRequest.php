<?php


namespace SpaceGame\Request;


class ViewUniverseRequest {
    private $userId = 0;
    private $seed = 0;
    private $maximumAmount = 0;
    private $minimumAmount = 0;
    private $radiusZ = 0;
    private $radiusX = 0;
    private $radiusY = 0;
    public function __construct($userId,$maximumAmount,$minimumAmount,$radiusX,$radiusY,$radiusZ)
    {
        $this->userId = $userId;
        $this->maximumAmount = $maximumAmount;
        $this->minimumAmount = $minimumAmount;
        $this->radiusX = $radiusX;
        $this->radiusZ = $radiusZ;
        $this->radiusY = $radiusY;

    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getRadiusZ()
    {
        return $this->radiusZ;
    }

    /**
     * @return int
     */
    public function getRadiusY()
    {
        return $this->radiusY;
    }

    /**
     * @return int
     */
    public function getRadiusX()
    {
        return $this->radiusX;
    }

    /**
     * @return int
     */
    public function getMinimumAmount()
    {
        return $this->minimumAmount;
    }

    /**
     * @return int
     */
    public function getMaximumAmount()
    {
        return $this->maximumAmount;
    }

    /**
     * @param int $seed
     */
    public function setSeed($seed)
    {
        $this->seed = $seed;
    }

    /**
     * @return int
     */
    public function getSeed()
    {
        return $this->seed;
    }



} 