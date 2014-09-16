<?php namespace SpaceGame\Entity;

/**
 * Class EngineEntity
 * @package SpaceGame\Entity
 */
class EngineEntity {

    /**
     * Contains the engine id
     *
     * @var int
     */
    private $engineId;

    /**
     * Contains the engine name
     *
     * @var
     */
    private $engineName;

    /**
     * Initialize the engine class and create engine
     *
     * @param $engineId
     * @param $engineName
     */
    public function __construct($engineId, $engineName)
    {
        $this->engineId =(int)$engineId;
        $this->engineName = $engineName;
    }

    /**
     * Return engine id
     *
     * @return mixed
     */
    public function getEngineId()
    {
        return $this->engineId;
    }

    /**
     * Return engine name
     *
     * @return mixed
     */
    public function getEngineName()
    {
        return $this->engineName;
    }

} 