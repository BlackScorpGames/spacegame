<?php


namespace SpaceGame\UseCase;

use PDO;
use SpaceGame\Request\MoveToLocationRequest;
use SpaceGame\Response\MoveToLocationResponse;

class MoveToLocationUseCase {
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function process(MoveToLocationRequest $request,MoveToLocationResponse $response){

    }
} 