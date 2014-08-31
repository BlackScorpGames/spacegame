<?php


namespace SpaceGame\UseCase;

use PDO;
use SpaceGame\Request\MoveToLocationRequest;
use SpaceGame\Response\MoveToLocationResponse;

class MoveToLocationUseCase {
    private $connection;
    private $ship;
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    private function loadShip($username){
        $sql = "
        SELECT * FROM users u
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

        foreach($rows as $row){

        }
    }
    public function process(MoveToLocationRequest $request,MoveToLocationResponse $response){

        $this->loadShip($request->getUserName());

    }
} 