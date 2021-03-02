<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include '../../model/contactModel.php';
include 'baseController.php';

class contactsController extends baseController
{

    private $contact;

    public function __construct()
    {
        $this->contact = new contactModel();
    }

    public function addContact()
    {
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $id = $this->contact->saveContact([
                'user_id' => $this->_getLoggedInUserId(),
                'first_name' => $_POST['firstname'],
                'last_name' => $_POST['lastname'],
                //'photo' => $_FILES['photo']['name']
            ]);
            //move_uploaded_file($_FILES['photo']['tmp_name'], '../../uploads' . $_FILES['photo']['name']);
            //getting 'permission denied' error when moving files.
            foreach ($_POST['email'] as $item) {
                $this->contact->saveEmails([
                    'contact_id' => $id,
                    'email' => $item
                ]);
            }

            foreach ($_POST['number'] as $item) {
                $this->contact->saveNumbers([
                    'contact_id' => $id,
                    'number' => $item
                ]);
            }

            return true;
        }

    }

    public function viewContact()
    {
        if ("GET" == $_SERVER["REQUEST_METHOD"]) {
            return $this->contact->fetchDetails($_GET['id']);
        }

    }

    public function editContact($id)
    {
        if ("POST" == $_SERVER["REQUEST_METHOD"]) {
            var_dump($id);
            exit();
            $result['id'] = $id;
            $result['details'] = ['first_name' => $_POST['firstname'], 'last_name' => $_POST['lastname']];
            //$this->contact->updateContact([  ]);
        }
    }

    public function deleteContact()
    {
        if ("POST" == $_SERVER["REQUEST_METHOD"]) {
            $deleted = $this->contact->delete($_POST['id']);
            if ($deleted) {
                echo "<script> alert('Deleted successfully!');window.location = '../contacts/contactsList.php'; </script>";
            }
        }

    }


    public function contactsList()
    {
        return $this->contact->getAllContacts($this->_getLoggedInUserId());
    }
}
