<?php


namespace SpaceGame\UseCase;


use SpaceGame\Entity\GalaxyEntity;
use SpaceGame\Request\ViewUniverseRequest;
use SpaceGame\Response\ViewUniverseResponse;
use SpaceGame\View\GalaxyView;

class ViewUniverseUseCase {

    public function process(ViewUniverseRequest $request,ViewUniverseResponse $response){
        mt_srand($request->getSeed());

        $countGalaxies = mt_rand($request->getMinimumAmount(),$request->getMaximumAmount());
        for($countGalaxy = 1;$countGalaxy<=$countGalaxies;$countGalaxy++){
             $galaxy = new GalaxyEntity($countGalaxy,'Galaxy-'.$countGalaxy);
            $posY = mt_rand($request->getMinimumUniverseAxis(),$request->getMaximumUniverseAxis());
            $posX = mt_rand($request->getMinimumUniverseAxis(),$request->getMaximumUniverseAxis());
            $posZ = mt_rand($request->getMinimumUniverseAxis(),$request->getMaximumUniverseAxis());
            $galaxy->setPosition($posY,$posX,$posZ);
            $galaxyView = new GalaxyView($galaxy);
            $response->galaxies[] = $galaxyView;
        }
    }
} 