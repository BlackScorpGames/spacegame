<?php namespace SpaceGame\Entity;

/**
 * Class SolarSystemEntity
 * @package SpaceGame\Entity
 */
class SolarSystemEntity {

    /**
     * Contains id of solar system
     *
     * @var int
     */
    private $solarSystemId = 0;

    /**
     * Contains name of solar system
     *
     * @var string
     */
    private $name = '';

    /**
     * Contains position x of solar system
     *
     * @var int
     */
    private $posX = 0;

    /**
     * Contains position y of solar system
     *
     * @var int
     */
    private $posY = 0;

    /**
     * Contains position z of solar system
     *
     * @var int
     */
    private $posZ = 0;


    /**
     * Initialize class and create solar system
     *
     * @param $solarSystemId
     * @param $name
     */
    public function __construct($solarSystemId, $name)
    {
        $this->solarSystemId = $solarSystemId;
        $this->name = $name;
    }

    /**
     * Setup position of solar system
     *
     * @param $posY
     * @param $posX
     * @param $posZ
     */
    public function setPosition($posY,$posX,$posZ){
        $this->posX = $posX;
        $this->posY = $posY;
        $this->posZ = $posZ;
    }

    /**
     * Return id of solar system
     *
     * @return int
     */
    public function getSolarSystemId()
    {
        return $this->solarSystemId;
    }



    /**
     * Return name of solar system
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Return position x of solar system
     *
     * @return int
     */
    public function getPosX()
    {
        return $this->posX;
    }

    /**
     * Return position y of solar system
     *
     * @return int
     */
    public function getPosY()
    {
        return $this->posY;
    }

    /**
     * Return position z of solar system
     *
     * @return int
     */
    public function getPosZ()
    {
        return $this->posZ;
    }

} 