<?php
include "baseModel.php";

class groupModel extends baseModel
{

    public function __construct()
    {
        parent::__construct();
    }
    public function saveGroup($data)
    {
        return $this->insert('groups', $data);
    }

    public function getAllGroups($id)
    {
        $sql = 'SELECT * FROM `groups` WHERE `user_id` =' . $this->_db->quote($id);;
        $statement = $this->_db->query($sql);
        return $statement->fetchAll();
    }

    public function getMembersCount($id)
    {
        $sql = 'SELECT COUNT(`id`) FROM `contact-group` WHERE `group_id` =' . $this->_db->quote($id);
        $statement = $this->_db->query($sql);
        return $statement->fetch();
    }
}