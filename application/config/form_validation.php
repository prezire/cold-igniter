<?php

  $config = array
  (
    'search' => array
    (
      array
      (
        'field' => 'keywords',
        'label' => 'Keywords',
        'rules' => 'required|trim|xss_clean'
      )
    ),
    'auth/login' => array
    (
      array
      (
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|valid_email|trim|xss_clean|min_length[3]'
      ),
      array
      (
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required|trim|xss_clean|min_length[1]'
      )
    ),
    'user' => array
    (
      array
      (
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|valid_email|trim|xss_clean|min_length[3]'
      )
    ),
    'role' => array
    (
      array
      (
        'field' => 'name',
        'label' => 'Name',
        'rules' => 'required|trim|xss_clean'
      )
    ),
    'permission' => array
    (
      array
      (
        'field' => 'name',
        'label' => 'Name',
        'rules' => 'required|trim|xss_clean'
      )
    ),
    'privilege' => array
    (
      array
      (
        'field' => 'name',
        'label' => 'Name',
        'rules' => 'required|trim|xss_clean'
      )
    )
  );