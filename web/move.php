<?php
require_once __DIR__.'/../bootstrap.php';

$targetX = $_GET['x'];
$targetY = $_GET['y'];
$username = 'test'; //$_SESSION['user']

//запрос
$request = new \SpaceGame\Request\MoveToLocationRequest($username,$targetY,$targetX);

//ответ
$response = new \SpaceGame\Response\MoveToLocationResponse();

//вариант использования
$usecase = new \SpaceGame\UseCase\MoveToLocationUseCase($pdo);
$usecase->process($request,$response);


