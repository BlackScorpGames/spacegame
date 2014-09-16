<?php
/**
 * Created by PhpStorm.
 * User: BlackScorp
 * Date: 16.09.2014
 * Time: 20:59
 */

namespace SpaceGame\View;


use SpaceGame\Entity\FactionEntity;

class FactionVIew {
    public $name = '';
    public $description = '';
    public function __construct(FactionEntity $entity){
        $this->name = $entity->getName();
        $this->description = $entity->getDescription();
    }
} 