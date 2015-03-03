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
    public final function create()
    {
      $data = multiUpload();
      if($data)
      {
        foreach($data as $d)
        {
          $this->db->insert('galleries', $d);
        }
        return true;
      }
      else
      {
        return false;
      }
    }
    public final function read($id)
    {
      return $this->db->get_where('galleries', array('id' => $id));
    }
    public final function update()
    {
      $i = $this->input;
      $a = array
      (
        'caption' => $i->post('caption'),
        'description' => $i->post('description')
      );
      //
      $s = $_FILES['files']['name'][0];
      $bHasFile = strlen($s) > 0;
      if($bHasFile)
      {
        $data = multiUpload();
        foreach($data as $d)
        {
          $a['original_filename']= $d['original_filename'];
          $a['filename']= $d['filename'];
        }
      }
      $this->db->where('id', $i->post('id'));
      $this->db->update('galleries', $a);
    }
    public final function delete( $id ) {
      $this->db->where('id', $id);
      return $this->db->delete('galleries');
    }
  }