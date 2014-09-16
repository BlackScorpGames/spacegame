<?php namespace SpaceGame\Entity;

/**
 * Class ShipEntity
 *
 * @package SpaceGame\Entity
 */
class ShipEntity {

    /**
     * Contains ship id
     *
     * @var int
     */
    private $shipId;

    /**
     * Contains ship name
     *
     * @var
     */
    private $shipName;

    /**
     * Contains user entity class
     *
     * @var UserEntity
     */
    private $owner;

    /**
     * Contains all engines for the ship
     *
     * @var array
     */
    private $engines = array();

    /**
     * Contains ship position y in universe
     *
     * @var int
     */
    private $posY = 0;

    /**
     * Contains ship position x in universe
     * @var int
     */
    private $posX = 0;

    /**
     * Initialize class and create ship
     *
     * @param $shipId
     * @param $shipName
     * @param UserEntity $owner хозяин
     */
    public function __construct($shipId,$shipName,UserEntity $owner)
    {
        $this->shipId = (int)$shipId;
        $this->owner = $owner;
        $this->shipName = $shipName;
    }

    /**
     * Add engine to available ship engines array
     *
     * @param EngineEntity $engine
     * @param $slot
     */
    public function addEngine(EngineEntity $engine,$slot){
        $this->engines[$slot] = $engine;
    }

    /**
     * Set ship position in universe
     *
     * @param $posY
     * @param $posX
     */
    public function setPosition($posY,$posX){
        $this->posX = (int)$posX;
        $this->posY = (int)$posY;
    }

    /**
     * Return ship position y
     *
     * @return int
     */
    public function getPosY()
    {
        return $this->posY;
    }

    /**
     * Return ship position x
     *
     * @return int
     */
    public function getPosX()
    {
        return $this->posX;
    }

} 