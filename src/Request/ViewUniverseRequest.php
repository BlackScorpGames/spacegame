<?php


namespace SpaceGame\Request;


class ViewUniverseRequest {
    private $username = '';
    private $seed = 0;

    public function __construct($username)
    {
        $this->username = $username;
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

} 