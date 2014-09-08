<?php


namespace SpaceGame\Response;


abstract class Response {
    public $errors = array();
    public $messages = array();
    public $failed = false;
    public $proceed = false;
} 