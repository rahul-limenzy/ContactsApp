<?php
include '../../model/baseModel.php';

class contactModel extends baseModel
{

    public function __construct()
    {
        parent::__construct();
    }

    public function saveContact($data)
    {
        return $this->insert('contacts', $data);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function  saveEmails($data)
    {
        return $this->insert('emails', $data);
    }

    public  function saveNumbers($data)
    {
        return $this->insert('numbers', $data);
    }

    public function fetchDetails($id)
    {
        $sql = 'SELECT * FROM `contacts` WHERE `id` =' . $this->_db->quote($id) . ' AND `user_id` =' . $_SESSION['id'];
        $statement = $this->_db->query($sql);
        $result['details'] = $statement->fetch();
        if($result['details']) {
            $sql = 'SELECT * FROM `emails` WHERE `contact_id` =' . $this->_db->quote($id);
            $statement = $this->_db->query($sql);
            $result['emails'] = $statement->fetchAll();

            $sql = 'SELECT * FROM `numbers` WHERE `contact_id` =' . $this->_db->quote($id);
            $statement = $this->_db->query($sql);
            $result['numbers'] = $statement->fetchAll();
        }
        return $result;
    }

    public function updateContact($values, $where)
    {
        $this->update('contacts', $values['details']);
        $this->update('emails',$values['emails']);
        $this->update('numbers',$values['numbers']);
    }

    public function Delete($id)
    {
        try {
            $this->_db->beginTransaction(); //begin transaction

            //remove from contacts table
            $sql = 'DELETE FROM `contacts` WHERE id =' . $this->_db->quote($id);
            $this->_db->query($sql);
            //remove from emails table
            $sql = 'DELETE FROM `emails` WHERE contact_id =' . $this->_db->quote($id);
            $this->_db->query($sql);
            //remove from numbers table
            $sql = 'DELETE FROM `numbers` WHERE contact_id =' . $this->_db->quote($id);
            $this->_db->query($sql);
            //remove from contact-group
            $sql = 'DELETE FROM `contact-group` WHERE contact_id =' . $this->_db->quote($id);
            $this->_db->query($sql);

            $this->_db->commit();//commit the transaction
            return true;
        }catch(Exception $e){
            echo $e->getMessage();
            //Rollback the transaction.
            $this->_db->rollBack();
        }

    }


    public function getAllContacts($id)
    {
        $sql = 'SELECT * FROM `contacts` WHERE `user_id` =' .$this->_db->quote($id);
        $statement = $this->_db->query($sql);
        return $statement->fetchAll();
    }
}