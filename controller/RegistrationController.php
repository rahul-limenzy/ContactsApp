<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include 'model/registrationModel.php';

class RegistrationController
{
    private $_model;

    public function __construct()
    {
        $this->_model = new registrationModel();
    }

    public function save()
    {
        $message = '';
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            if ($_POST['password'] == $_POST['confirm_password']) {
                if (!$this->_model->checkUserExist($_POST['email'])) {
                    $this->_model->saveUser([
                        'full_name' => $_POST['full_name'],
                        'email' => $_POST['email'],
                        'password' => $this->_model->hashPassword($_POST['password'])
                    ]);
                    header('Location: login.php');
                } else {
                    $message = 'User already exist';
                }
            } else {
                $message = 'Invalid password';
            }
        }
        return $message;
    }
}
