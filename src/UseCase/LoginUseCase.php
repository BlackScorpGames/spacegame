<?php


namespace SpaceGame\UseCase;


use SpaceGame\Request\LoginRequest;
use SpaceGame\Response\LoginResponse;
use SpaceGame\Service\PasswordHasherService;
use PDO;

class LoginUseCase {
    private $connection;
    private $passwordHasher;
    public function __construct(PDO $connection,PasswordHasherService $passwordHasher){
        $this->connection = $connection;
        $this->passwordHasher = $passwordHasher;
    }

    private function assignValues(LoginRequest $request, LoginResponse $response)
    {
        $response->email = $request->getEmail();
        $response->password = $request->getPassword();
    }
    private function getUser(LoginRequest $request){
        $sql = "SELECT userId,password FROM users WHERE email = :email";
        $statement = $this->connection->prepare($sql);
        $statement->execute(array(
                ':email'=>$request->getEmail()
            ));
        return $statement->fetch(PDO::FETCH_OBJ);

    }
    private function fail(LoginResponse $response){
        $response->failed = true;
        $response->errors[]= _('Invalid login');
    }
    public function process(LoginRequest $request,LoginResponse $response){
        $response->proceed = true;
        $this->assignValues($request,$response);
        $user = $this->getUser($request);
        if(!$user){
            $this->fail($response);
            return;
        }
        $passwordIsCorrect = $this->passwordHasher->verify($user->password,$request->getPassword());
        if(!$passwordIsCorrect){
            $this->fail($response);
            return;
        }
        $response->userId = $user->userId;
        $response->messages[]=_('Login successful');
    }
} 