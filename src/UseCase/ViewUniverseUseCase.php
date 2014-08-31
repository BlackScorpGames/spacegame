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

        $radiusX =  mt_rand($request->getMinimumUniverseAxis(),$request->getMaximumUniverseAxis());
        $radiusY =  mt_rand($request->getMinimumUniverseAxis(),$request->getMaximumUniverseAxis());
        $radiusZ = mt_rand($request->getMinimumUniverseAxis(),$request->getMaximumUniverseAxis());

        for($countGalaxy = 1;$countGalaxy<=$countGalaxies;$countGalaxy++){
             $galaxy = new GalaxyEntity($countGalaxy,'Galaxy-'.$countGalaxy);
            $phi = rad2deg(mt_rand(0,360));
            $theta = rad2deg(mt_rand(0,360));


            $posY =round($radiusX * cos($theta)*sin($phi)) ;
            $posX =round($radiusY * sin($theta)*sin($phi));
            $posZ = round($radiusZ * cos($phi));
            $galaxy->setPosition($posY,$posX,$posZ);
            $galaxyView = new GalaxyView($galaxy);
            $response->galaxies[] = $galaxyView;
        }
    }
} 