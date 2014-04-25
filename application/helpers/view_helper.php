<?php
  function showView($view, $data = null)
  {
    $CI = get_instance();
    $CI->show->view('commons/layouts/header', $data);
    $CI->show->view($view, $data);
    $CI->show->view('commons/layouts/footer', $data);
  }
  function showJsonView($data)
  {
    $CI = get_instance();
    $CI->output
    ->set_content_type('application/json')
    ->set_output(json_encode($data));
  }