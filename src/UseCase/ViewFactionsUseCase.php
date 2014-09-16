<?php
/**
 * Created by PhpStorm.
 * User: BlackScorp
 * Date: 16.09.2014
 * Time: 20:49
 */

namespace SpaceGame\UseCase;


use SpaceGame\Entity\FactionEntity;
use SpaceGame\Request\ViewFactionsRequest;
use SpaceGame\Response\ViewFactionsResponse;
use SpaceGame\View\FactionVIew;

class ViewFactionsUseCase {
    private $factions;
    public function __construct(array $factions){

        foreach($factions as $faction){
            $factionEntity = $this->arrayToEntity($faction);
            $this->factions[$factionEntity->getFactionId()] = $factionEntity;
        }
    }

    public function process(ViewFactionsRequest $request, ViewFactionsResponse $response){
        foreach($this->factions as $faction){
            $response->factions[]=new FactionVIew($faction);
        }
    }

    private function arrayToEntity(array $array){
        $factionId = count($this->factions);
        $factionId++;
        return new FactionEntity($factionId,$array['name'],$array['description']);
    }
} 