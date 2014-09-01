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

        $radiusX = 1000;
        $radiusY = 500;
        $radiusZ = 500;


        $positions = array();
        for($countGalaxy = 1;$countGalaxy<=$countGalaxies;$countGalaxy++){
            $galaxy = new GalaxyEntity($countGalaxy,'Galaxy-'.$countGalaxy);
            $phi = rad2deg(mt_rand(0,360));
            $theta = rad2deg(mt_rand(0,pi()*4));

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
                $galaxy->setPosition($posY,$posX,$posZ);
                $galaxyView = new GalaxyView($galaxy);
                $response->galaxies[] = $galaxyView;
                $positions[$key] = true;
            }

        }
    }

} 