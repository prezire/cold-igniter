<?php  
  class GalleryModel extends CI_Model
  {
    public function __construct()
    {
      parent::__construct();
    }
    public final function index()
    {
      return $this->db->get('galleries');
    }
  }