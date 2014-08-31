<?php


namespace SpaceGame\UseCase;

use PDO;
use SpaceGame\Entity\EngineEntity;
use SpaceGame\Entity\ShipEntity;
use SpaceGame\Entity\UserEntity;
use SpaceGame\Request\MoveToLocationRequest;
use SpaceGame\Response\MoveToLocationResponse;

class MoveToLocationUseCase {
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    private function loadShip($username){
        $sql = "
        SELECT
        u.id AS userId,
        u.username,
        s.id AS shipId,
        s.shipname,
        e.id AS engineId,
        e.name AS enginename,
        se.slot
        FROM users u
        INNER JOIN ships s ON(u.id = s.user_id)
        INNER JOIN ship_has_engines se ON(se.ship_id = s.id)
        INNER JOIN engines e ON(se.engine_id = e.id)
        WHERE u.username = :username
        ";
        $statement = $this->connection->prepare($sql);
        $parameters = array(
          ':username'=>$username
        );
        $statement->execute($parameters);
        $rows = $statement->fetchAll(PDO::FETCH_OBJ);

        $user = null;
        $ship = null;
        foreach($rows as $row){
            if(!$user){
                $user = new UserEntity($row->userId,$row->username);
            }
            if(!$ship){
                $ship = new ShipEntity($row->shipId,$row->shipname,$user);
            }
            $engine = new EngineEntity($row->engineId,$row->enginename);
            $ship->addEngine($engine,$row->slot);
        }
        return $ship;
    }
    public function process(MoveToLocationRequest $request,MoveToLocationResponse $response){
        $ship = $this->loadShip($request->getUserName());
        if(!$ship){
            return;
        }
        var_dump($ship);
    }
} 