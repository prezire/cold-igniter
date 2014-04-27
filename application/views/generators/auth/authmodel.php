<?php  
  class AuthModel extends CI_Model
  {
    public function __construct()
    {
      parent::__construct();
    }
    public final function login()
    {
      return $this->db->get_where
      (
        'users', 
        getPostValuePair()
      );
    }
  }