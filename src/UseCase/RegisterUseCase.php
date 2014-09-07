<?php


namespace SpaceGame\UseCase;

use PDO;
use SpaceGame\Request\RegisterRequest;
use SpaceGame\Response\RegisterResponse;

class RegisterUseCase
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    private function assignValues(RegisterRequest $request, RegisterResponse $response)
    {
        $response->email = $request->getEmail();
        $response->password = $request->getPassword();
        $response->passwordConfirm = $request->getPasswordConfirm();
    }

    private function validateValues(RegisterRequest $request, RegisterResponse $response)
    {
        $email = $request->getEmail();
        $sql = "SELECT 1 FROM users WHERE email = :email";
        $statement = $this->connection->prepare($sql);
        $statement->execute(array(':email' => $request->getEmail()));
        $emailExists = (bool)$statement->fetchColumn();
        $password = $request->getPassword();
        $passwordConfirm = $request->getPasswordConfirm();
        if (empty($email)) {
            $response->errors[] = _('Email is empty');
        }
        if ($emailExists) {
            $response->errors[] = _('Email already exists');
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response->errors[] = _('Email is not valid');
        }
        if (empty($password)) {
            $response->errors[] = _('Password is empty');
        }
        if (strlen($password) < 6) {
            $response->errors[] = _('Password is too short');
        }
        if ($password !== $passwordConfirm) {
            $response->errors[] = _('Password confirm is not same as password');
        }

        $response->failed = count($response->errors) > 0;
    }

    private function createUser(RegisterRequest $request, RegisterResponse $response)
    {
        $sql = "INSERT INTO users (email,password) VALUES (:email,:password)";
        $passwordHash = password_hash($request->getPassword(), PASSWORD_BCRYPT);
        $statement = $this->connection->prepare($sql);
        $statement->execute(
            array(
                ':email' => $request->getEmail(),
                ':password' => $passwordHash
            )
        );
    }

    public function process(RegisterRequest $request, RegisterResponse $response)
    {
        $this->assignValues($request, $response);
        $this->validateValues($request, $response);
        if ($response->failed) {
            return;
        }
        $this->createUser($request, $response);

    }
} 