<?php namespace SpaceGame\Entity;


/**
 * Class FactionEntity
 * @package SpaceGame\Entity
 */
class FactionEntity {

    /**
     * Contains faction id
     *
     * @var int
     */
    private $factionId = 0;

    /**
     * Contains faction name
     *
     * @var string
     */
    private $name = '';

    /**
     * Contains faction description
     *
     * @var string
     */
    private $description = '';

    /**
     * Initialize class and create faction
     *
     * @param $factionId
     * @param $name
     * @param $description
     */
    public function __construct($factionId, $name, $description)
    {
        $this->factionId = $factionId;
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * Return faction description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Return faction id
     *
     * @return int
     */
    public function getFactionId()
    {
        return $this->factionId;
    }

    /**
     * Return faction name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


} 