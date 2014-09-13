<?php


namespace SpaceGame\Entity;


class SolarSystemEntity {
    private $solarSystemId = 0;
    private $name = '';
    private $posX = 0;
    private $posY = 0;
    private $posZ = 0;

    public function __construct($solarSystemId, $name)
    {
        $this->solarSystemId = $solarSystemId;
        $this->name = $name;
    }
    public function setPosition($posY,$posX,$posZ){
        $this->posX = $posX;
        $this->posY = $posY;
        $this->posZ = $posZ;
    }

    /**
     * @return int
     */
    public function getSolarSystemId()
    {
        return $this->solarSystemId;
    }



    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPosX()
    {
        return $this->posX;
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
    public function getPosZ()
    {
        return $this->posZ;
    }

} 