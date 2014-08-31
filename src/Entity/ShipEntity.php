<?php


namespace SpaceGame\Entity;


class ShipEntity {
    private $shipId;
    private $shipName;
    private $owner;
    private $engines = array();

    /**
     * @param $shipId
     * @param $shipName
     * @param UserEntity $owner хозяин
     */
    public function __construct($shipId,$shipName,UserEntity $owner)
    {
        $this->shipId = $shipId;
        $this->owner = $owner;
        $this->shipName = $shipName;
    }
    public function addEngine(EngineEntity $engine,$slot){
        $this->engines[$slot] = $engine;
    }
} 