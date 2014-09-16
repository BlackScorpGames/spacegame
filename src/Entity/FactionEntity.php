<?php
/**
 * Created by PhpStorm.
 * User: BlackScorp
 * Date: 16.09.2014
 * Time: 20:53
 */

namespace SpaceGame\Entity;


class FactionEntity {
    private $factionId = 0;
    private $name = '';
    private $description = '';

    public function __construct($factionId, $name, $description)
    {
        $this->factionId = $factionId;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getFactionId()
    {
        return $this->factionId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


} 