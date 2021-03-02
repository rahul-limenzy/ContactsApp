<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include '../model/loginModel.php';
include "baseController.php";

class LoginController extends baseController
{

    private $_model;

    public function __construct()
    {
       // parent::__construct();
        $this->_model = new loginModel();
    }

    public function login()
    {
//
        if (isset($_SESSION['id'])) {
            header('Location: /index.php');
        } else {
            $message = '';
            if ('POST' === $_SERVER['REQUEST_METHOD']) {
                if ($this->_model->checkValidUser($_POST['email'], $_POST['password'])) {
                    $values = $this->_model->getUserDetails($_POST['email']);
                    $_SESSION['email'] = $values['email'];
                    $_SESSION['name'] = $values['full_name'];
                    $_SESSION['id'] = $values['id'];
                    header('Location: ../index.php');
                } else {
                    $message = ' Invalid user details';
                }
            }
            return $message;
        }
    }

    public function logout()
    {

        if (isset($_SESSION['id'])) {
            unset($_SESSION['id']);
            unset($_SESSION['email']);
            unset($_SESSION['name']);
            header('Location:login.php');
        }


    }
}
