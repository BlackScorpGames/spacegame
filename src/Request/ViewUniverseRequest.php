<?php


namespace SpaceGame\Request;


class ViewUniverseRequest {
    private $username = '';
    private $seed = 0;
    private $maximumAmount = 0;
    private $minimumAmount = 0;
    private $maximumUniverseAxis = 0;
    private $minimumUniverseAxis = 0;
    public function __construct($username,$maximumAmount,$minimumAmount,$maximumUniverseAxis,$minimumUniverseAxis)
    {
        $this->username = $username;
        $this->maximumAmount = $maximumAmount;
        $this->minimumAmount = $minimumAmount;
        $this->maximumUniverseAxis = $maximumUniverseAxis;
        $this->minimumUniverseAxis = $minimumUniverseAxis;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
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

    /**
     * @return int
     */
    public function getMaximumAmount()
    {
        return $this->maximumAmount;
    }

    /**
     * @return int
     */
    public function getMaximumUniverseAxis()
    {
        return $this->maximumUniverseAxis;
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
    public function getMinimumUniverseAxis()
    {
        return $this->minimumUniverseAxis;
    }

} 