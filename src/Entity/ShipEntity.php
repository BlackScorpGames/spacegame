<?php


namespace SpaceGame\Entity;


class ShipEntity {
    private $shipId;
    private $shipName;
    private $owner;
    private $engines = array();
    private $posY = 0;
    private $posX = 0;
    /**
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
    public function addEngine(EngineEntity $engine,$slot){
        $this->engines[$slot] = $engine;
    }
    public function setPosition($posY,$posX){
        $this->posX = (int)$posX;
        $this->posY = (int)$posY;
    }

    /**
     * @return int
     */
    public function getPosY()
    {
        return $this->posY;
    }

    /**
     * @return int
     */
    public function getPosX()
    {
        return $this->posX;
    }

} 