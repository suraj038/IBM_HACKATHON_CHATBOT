<?php
  include_once('config.php');
  
  class Reservation
  {
    
    private $_db;
    
    public function __construct()
    {
      $this->_db = new mysqli( mysqlServer, mysqlUser, mysqlPass, mysqlDB);
      if ($this->_db->connect_errno) 
      {
          echo "Failed to connect to MySQL: (" . $this->_db->connect_errno . ") " . $this->_db->connect_error;
          die();
      }
    }
    
    /*  */
    public function __destruct()
    {
      $this->_db->close();
    }
    
    /* */
    public function createReservation($p_operation, $p_data) 
    {
      //error_log('In createReservation function.');
      //echo $p_data['i_age'];
      
      $return_data = array();
      
      if(empty($p_data) && !is_array($p_data))
      {   
         $return_data['status'] = 'E';
         $return_data['message'] = 'Input can not be empty and should be array.';
         return $return_data;
      }
      
      if($p_operation == 'CREATE')
      {
         $statement = $this->_db->prepare("INSERT INTO reservation(i_name, i_address, i_phn_no, i_age, account_type, r_status) VALUES(?, ?, ?, ?, ?, ?)");
        //  echo "$statement";
         $statement->bind_param('ssisss', $p_data['i_name'], $p_data['i_address'], $p_data['i_phn_no'], $p_data['i_age'], $p_data['account_type'], $p_data['r_status']);
         $statement->execute();
         error_log('Insert successful');
        //  echo $this->_db->insert_id;
          $return_data['status'] = 'S';
          $return_data['message'] = 'Your Account is confirmed. Account number is <b>' . $this->_db->insert_id . '</b>. Please keep this number for future reference';
         
         $statement->close();
      }
      else if($p_operation == 'UPDATE')
      {
         $statement = $this->_db->prepare("UPDATE reservation SET i_name = '" . $p_data['i_name'] . "', i_address = '" . $p_data['i_address'] . "', r_status = '" . $p_data['r_status'] . "' WHERE id = ?" );
         $statement->bind_param('s', $p_data['id']);
         $statement->execute();
         
         $return_data['status'] = 'S';
         $return_data['message'] = 'Update successful';
         
         $statement->close();
         //error_log('Update successful');
      }
      
      return $return_data;
    }
    
    /* */
    public function getReservation($p_id) 
    {
      $statement = $this->_db->prepare("SELECT id, i_name, i_address, i_phn_no, i_age, account_type, r_status FROM reservation WHERE id = ?");
      $statement->bind_param('i', $p_id);
      $statement->execute();
      $statement->bind_result($id, $i_name, $i_address, $i_phn_no, $i_age, $account_type, $r_status);
      $statement->fetch();
      $statement->close();
      
      //error_log('Got from DB session_id=' . $session_id . ' and session_json_data=' . $session_json_data);
      
      $return_array = array();
      
      if(!empty($id))
      {
         $return_array['id'] = $id;
         $return_array['i_name'] = $i_name;
         $return_array['i_address'] = $i_address;
         $return_array['i_phn_no'] = $i_phn_no;
         $return_array['i_age'] = $i_age;
         $return_array['account_type'] = $account_type;
         $return_array['r_status'] = $r_status;
      }
      
      return $return_array;
    }
  }
?>