<?php

class User extends Table
{

    public $user_id = 0;
    public $lastname = '';
    public $firstname = '';
    public $patronymic = '';
    public $login = '';
    public $pass = '';
    public $gender_id = 0;
    public $birthday = null;
    public $role_id = 0;
    public $active = 1;


    public function validate() {
       if (!empty($this->lastname) && !empty($this->firstname) && !empty($this->login) && !empty($this->pass) && !empty($this->role_id) && !empty($this->gender_id)){
    return true;
}
    return false;
    }
}
