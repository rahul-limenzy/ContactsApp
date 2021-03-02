<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include '../../model/groupModel.php';
include 'baseController.php';

class groupsController extends  baseController
{
    private $group;

    public function __construct()
    {
        $this->group = new groupModel();
    }

    public function save()
    {
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $this->group->saveGroup([
                'user_id' => $_SESSION['id'],
                'group_name' => $_POST['group-name']]);
        }
    }

    public function groupsList()
    {
        return $this->group->getAllGroups($this->_getLoggedInUserId());
    }

    public function membersCount($id)
    {
        $val = $this->group->getMembersCount($id);
        return $val['COUNT(`id`)'];
    }


}
