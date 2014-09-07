<?php


namespace SpaceGame\Request;


class RegisterRequest {
    private $email = '';
    private $password = '';
    private $passwordConfirm = '';

    public function __construct($email, $password, $passwordConfirm)
    {
        $this->email = $email;
        $this->password = $password;
        $this->passwordConfirm = $passwordConfirm;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getPasswordConfirm()
    {
        return $this->passwordConfirm;
    }

} 