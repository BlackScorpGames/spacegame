<?php


namespace SpaceGame\UseCase;


use SpaceGame\Entity\GalaxyEntity;
use SpaceGame\Entity\SolarSystemEntity;
use SpaceGame\Request\ViewUniverseRequest;
use SpaceGame\Response\ViewUniverseResponse;
use SpaceGame\View\GalaxyView;
use SpaceGame\View\SolarSystemView;

class ViewUniverseUseCase {

    public function process(ViewUniverseRequest $request,ViewUniverseResponse $response){
        mt_srand($request->getSeed());

        $countSolarSystems = mt_rand($request->getMinimumAmount(),$request->getMaximumAmount());

        $radiusX = $request->getRadiusX();
        $radiusY = $request->getRadiusY();
        $radiusZ = $request->getRadiusZ();


        $positions = array();

        for($countSolarSystem = 1;$countSolarSystem<=$countSolarSystems;$countSolarSystem++){
            $solarSystem = new SolarSystemEntity($countSolarSystem,'SolarSystem-'.$countSolarSystem);
            $phi = rad2deg(mt_rand(0,360));
            $theta = rad2deg(mt_rand(0,360));

            $maxY = round($radiusX * cos($theta)*sin($phi));
            $maxX = round($radiusY * sin($theta)*sin($phi));
            $maxZ = round($radiusZ * cos($phi));


            if($maxX < 0){
                $posX = mt_rand($maxX,0);
            }else{
                $posX = mt_rand(0,$maxX);
            }

            if($maxY < 0){
                $posY = mt_rand($maxY,0);
            }else{
                $posY = mt_rand(0,$maxY);
            }

            if($maxZ < 0){
                $posZ = mt_rand($maxZ,0);
            }else{
                $posZ = mt_rand(0,$maxZ);
            }

            $key = sprintf("%d/%d/%d",$posY,$posX,$posZ);
            if(!isset($positions[$key])){
                $solarSystem->setPosition($posY,$posX,$posZ);
                $solarSystemView = new SolarSystemView($solarSystem);
                $response->solarSystems[] = $solarSystemView;
                $positions[$key] = true;
            }

        }
    }

} 