<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();

class baseController
{

    public function __construct()
    {
        if (! isset($_SESSION['id'])) {
            header('location: /view/login.php');
        }
    }

    protected function _getLoggedInUserId()
    {
        $id = 0;
        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
        }
        return $id;
    }

    protected function _getLoggedInUserEmail()
    {
        $email = '';
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        }
        return $email;
    }

    public function getLoggedInUserName()
    {
        $userName = '';
        if (isset($_SESSION['name'])) {
            $userName = $_SESSION['name'];
        }
        return $userName;
    }

}