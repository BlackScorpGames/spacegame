<?php


namespace SpaceGame\Response;


class RegisterResponse {
    public $errors = array();
    public $failed = false;
    public $email = '';
    public $password = '';
    public $passwordConfirm = '';
} 