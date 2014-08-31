<?php


namespace SpaceGame\Entity;


class EngineEntity {
    private $engineId;
    private $engineName;

    public function __construct($engineId, $engineName)
    {
        $this->engineId =(int)$engineId;
        $this->engineName = $engineName;
    }

    /**
     * @return mixed
     */
    public function getEngineId()
    {
        return $this->engineId;
    }

    /**
     * @return mixed
     */
    public function getEngineName()
    {
        return $this->engineName;
    }

} 