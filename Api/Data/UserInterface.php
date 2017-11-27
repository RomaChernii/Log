<?php

namespace Smile\Login\Api\Data;


interface UserInterface
{
    const USER_ID = 'user_id';
    const LASTNAME = 'lastname';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const AUTH_TIME = 'auth_time';

    public function getId();

    public function getLastname();

    public function getEmail();

    public function getPassword();

    public function getAuthTime();

    public function setId($id);

    public function setLastname($lastname);

    public function setEmail($email);

    public function setPassword($password);

    public function setAuthTime($authTime);
}