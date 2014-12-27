<?php
	function isDeletableRole($needle)
	{
		$defaults = array
		(
			'Administrator',
			'Subscriber',
			'Moderator'
		);
		return !in_array($needle, $defaults);	
	}
	function isDeletablePermission($needle)
	{
		$defaults = array('User', 'Authentication', 'Page', 'Report');
		return !in_array($needle, $defaults);
	}
	function isDeletablePrivilege($needle)
	{
		$defaults = array('Create', 'Read', 'Update', 'Delete');
		return !in_array($needle, $defaults);
	}