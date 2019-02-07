<?php

  class User_model extends CI_Model {

    /**
    * Login function
    */
    public function login_user($username, $password) {
      // Equivalent of WHERE = ? for username and password
      $this->db->where('username', $username);
      $this->db->where('password', $password);
      // Get the users where the username and password match
      $result = $this->db->get('users');

      // If there is a match
      if($result->num_rows() == 1) {
        // return the id
        return $result->row(0)->id;
      } else { // If there is no match
        return false;
      }
    }

  }

?>
