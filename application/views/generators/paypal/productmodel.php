<?php
  class ProductModel extends CI_Model
  {
    public function __construct()
    {
      parent::__construct();
    }
    public final function transact()
    {
      //TODO: Do something here...
      $a = array();
      $this->db->insert('products', $a);
      //
      $id = $this->db->insert_id();
      $this->db->get_where
      (
        'products', 
        array('id' => $id)
      );
    }
    public final function getItemByCode()
    {
      $this->db->get_where
      (
        'products',
        array
        (
          'id' => 
          $this->input->post('item_number')
        )
      );
    }
  }