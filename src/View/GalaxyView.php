<?php


namespace SpaceGame\View;


use SpaceGame\Entity\GalaxyEntity;

class GalaxyView {
    public $posY;
    public $posX;
    public $posZ;
    public $galaxyId;
    public $galaxyName;

    public function __construct(GalaxyEntity $galaxyEntity)
    {
        $this->posZ = $galaxyEntity->getPosZ();
        $this->posY = $galaxyEntity->getPosY();
        $this->posX = $galaxyEntity->getPosX();
        $this->galaxyId = $galaxyEntity->getGalaxyId();
        $this->galaxyName = $galaxyEntity->getName();
    }

} 