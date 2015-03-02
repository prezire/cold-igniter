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
    private final function upload()
    {
      $this->load->library('multi_upload/my_upload');
      $c = array
      (
        'upload_path' => 'public/uploads/', 
        'allowed_types' => 'gif|jpg|png',
        'encrypt_name' => true
      );
      $this->my_upload->initialize($c);
      if($this->my_upload->do_multi_upload('files'))
      {
        $data = $this->my_upload->get_multi_upload_data();
        $l = array();
        foreach($data as $d)
        {
          $a = array
          (
            'filename' => $d['file_name'], 
            'original_filename' => $d['orig_name']
          );
          array_push($l, $a);
        }
        return $l;
      }
      else
      {
        show_error($this->my_upload->display_errors()); 
      } 
    }
    public final function create()
    {
      $data = $this->upload();
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
      $bHasFile = count($s > 0);
      if($bHasFile)
      {
        $data = $this->upload();
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