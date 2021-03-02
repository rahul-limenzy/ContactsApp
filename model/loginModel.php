<?php
include '../model/baseModel.php';

class loginModel extends baseModel
{

    public function __construct()
    {
        parent::__construct();
    }

    public function checkValidUser($username, $password)
    {
        $query = 'SELECT COUNT(`id`) FROM `users` WHERE `email`=' . $this->_db->quote($username)
            . ' AND `password`=' . $this->_db->quote($this->hashPassword($password));
        $statement = $this->_db->query($query);
        return $statement->fetchColumn() > 0;
    }
    public function getUserDetails($email)
    {
        $query = 'SELECT * FROM `users` WHERE `email`=' . $this->_db->quote($email);
        $statement = $this->_db->query($query);
        return $statement->fetch();
    }
}