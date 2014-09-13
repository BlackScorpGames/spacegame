<?php


namespace SpaceGame\View;


use SpaceGame\Entity\SolarSystemEntity;

class SolarSystemView {
    public $posY;
    public $posX;
    public $posZ;
    public $solarSystemId;
    public $solarSystemName;

    public function __construct(SolarSystemEntity $solarSystemEntity)
    {
        $this->posZ = $solarSystemEntity->getPosZ();
        $this->posY = $solarSystemEntity->getPosY();
        $this->posX = $solarSystemEntity->getPosX();
        $this->solarSystemId = $solarSystemEntity->getSolarSystemId();
        $this->solarSystemName = $solarSystemEntity->getName();
    }

} 