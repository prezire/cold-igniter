<?php
	function getLoggedUser() 
	{
		$CI = get_instance();
		return $CI->session->userdata( 'user' );
	}
	function getRoleName()
	{
		$CI = get_instance();
		$CI->load->model('rolemodel');
		$s = $CI->rolemodel->read(getLoggedUser()->role_id)->row()->name;
		return $s;
	}
	function getHasOriginalUser()
	{
		$CI = get_instance();
		$s = $CI->session->userdata('originalUser');
		$b = $s != '';
		return $b;
	}
	function isLoggedIn() {return getLoggedUser() != null;}
	/*
	    Filters the currently executing method based on the listed
	    methods names. Place this in the constructor.

	    @param  $methodNames  Array. The list of methods to filter.
	    @param  $type   String. Either include or exclude. Include checks
	    all methodsNames and re-routes the user if he's not logged in.

	    Exclude is used when there are are a lot of methodNames
	    and only a few methods that does need any checking. When
	    exclude is used, all methods are checked except for the ones
	    listed in the methodNames.

	    Examples:
	    1. validateLoginSession(array('index', 'create'))
	      - If method is index or create, this method checks for session.

	    2. validateLoginSession(array('read'), 'exclude')
	      - If method is index, create, update, this method checks
	      for session and redirects the user if he's not logged in.
	      If the executing method is read, this method does nothing.
	*/
	function validateLoginSession
	( 
		$methodNames = array('index', 'create', 'read', 'update', 'delete'), 
		$type = 'include' 
	) {
		$CI = get_instance();
		$m = $CI->router->fetch_method();
		$b = in_array( $m, $methodNames );
		switch ( $type ) {
		case 'include':
			if (!$b || !isLoggedIn()) 
				redirect( site_url( 'auth/login' ) );
			break;
		case 'exclude':
			if (!$b || !isLoggedIn()) 
				redirect( site_url( 'auth/login' ) );
			break;
		}
	}
	function hasPrivilege( $privilegeName ) {
		$CI = get_instance();
		$CI->load->model( 'permissionmodel' );
		$b = $CI->permissionmodel->readHasPrivilege( $privilegeName );
		return $b;
	}
	/*
		Usage:
		//All permissions to privilege. Equivalent to hasPrivilege('Page').
		if(hasPermissions('Page')){...}
		//Specific permissions to privilege.
		if(hasPermissions('Page', array('Create', 'Update'))){...}
	*/
	function hasPermissions(
		$privilegeName,
		$permissions = array( 'Create', 'Read', 'Update', 'Delete' )
	) {
		$CI = get_instance();
		$CI->load->model( 'permissionmodel' );
		$b = $CI->permissionmodel->readHasPermissions( $privilegeName, $permissions );
		return $b;
	}