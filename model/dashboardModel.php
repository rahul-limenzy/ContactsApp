<?php

include 'baseModel.php';

class dashboardModel extends baseModel
{
    private $_userId;

    public function __construct($userId)
    {
        parent::__construct();
        $this->_userId = $userId;
    }

    public function getTotalContacts()
    {
        $query = 'SELECT COUNT(`id`) FROM `contacts` WHERE `user_id`=' . $this->_db->quote($this->_userId, PDO::PARAM_INT);
        $statement = $this->_db->query($query);
        $count = $statement->fetchColumn();
        return $count;
    }

    public function getTotalGroups()
    {
        $query = 'SELECT COUNT(`id`) FROM `groups` WHERE `user_id`=' . $this->_db->quote($this->_userId, PDO::PARAM_INT);
        $statement = $this->_db->query($query);
        $count = $statement->fetchColumn();
        return $count;
    }

}