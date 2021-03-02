<?php
include 'model/baseModel.php';

class registrationModel extends baseModel
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $email
     * @return bool
     */
    public function checkUserExist($email)
    {
        $query = 'SELECT COUNT(`id`) FROM `users` WHERE `email`=' . $this->_db->quote($email);
        $statement = $this->_db->query($query);
        return $statement->fetchColumn() > 0;
    }

    /**
     * @param array $data
     * @return int $id last insert id
     */
    public function saveUser(array $data)
    {
        return $this->insert('users', $data);
    }

}