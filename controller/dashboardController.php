<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include 'controller/baseController.php';
include 'model/dashboardModel.php';

class dashboardController extends baseController
{
    private $_model;

    public function __construct()
    {
        parent::__construct();
        $this->_model = new dashboardModel($this->_getLoggedInUserId());
    }

    public function indexAction()
    {
        $data = [
            'contacts' => $this->_model->getTotalContacts(),
            'groups' => $this->_model->getTotalGroups(),
            'graphData' => '',
        ];
        return $data;
    }
}