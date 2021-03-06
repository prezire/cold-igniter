<?php
  function getPostValuePair($excludeList = array())
  {
    $CI = get_instance();
    $post = $CI->input->post();
    $list = array();
    foreach($post as $key => $value)
    {
      if(!in_array($key, $excludeList))
      {
        $list[$key] = $value;
      }
    }
    return $list;
  }
  /*
  * Serializes string-based URL params into array. The parameter 
  * must be at the last portion of the parameter list.
  * @param    $fromIndex    1-based index.
  * @return   array.
  */
  function getArrayParams($fromIndex)
  {
    $CI = get_instance();
    $a = $CI->uri->segment_array();
    $toIndex = count($a) - 1;
    $a = array_slice($a, $fromIndex, $toIndex);
    return $a;
  }
  function upload($fieldName)
  {
    if($_FILES[$fieldName]['error'] < 1)
    {
      $config['upload_path'] = './public/uploads/';
      $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
      $config['encrypt_name'] = true;
      //
      $CI = get_instance();
      $CI->load->library('upload', $config);
      if($CI->upload->do_upload($fieldName))
      {
        return $CI->upload->data();
      }
      else
      {
        return $CI->upload->display_errors();
      }
    }
    else
    {
      return null;
    }
  }
  function multiUpload($fieldName = 'files')
  {
    $CI = get_instance();
    $CI->load->library('multi_upload/my_upload');
    $c = array
    (
      'upload_path' => 'public/uploads/', 
      'allowed_types' => 'gif|jpg|png',
      'encrypt_name' => true
    );
    $CI->my_upload->initialize($c);
    if($CI->my_upload->do_multi_upload($fieldName))
    {
      $data = $CI->my_upload->get_multi_upload_data();
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
      show_error($CI->my_upload->display_errors()); 
    } 
  }
  function sendEmailer
  (
    $subject, 
    $from, 
    $to, 
    $message, 
    $cc = null,
    $bcc = null
  )
  {
    $CI = get_instance();
    $CI->email->set_newline("\r\n");
    $CI->email->from($from);
    $CI->email->to($to);
    $CI->email->bcc($cc);
    $CI->email->subject($subject);
    $CI->email->message($message);
    $CI->email->send();
    if(!$CI->email->send())
    {
      show_error($CI->email->print_debugger());
      exit;
    }
  }
  function generateToken($key)
  {
    return sha1($key . date('Ymd') . rand(0, 999) . time());
  }