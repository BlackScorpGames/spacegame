<?php
/**
 * Created by PhpStorm.
 * User: BlackScorp
 * Date: 16.09.2014
 * Time: 20:51
 */

namespace SpaceGame\Response;


use SpaceGame\View\FactionVIew;

class ViewFactionsResponse extends Response{
    /**
     * @var FactionVIew[]
     */
    public  $factions = array();
} 