<div id="permission" class="userPermission row">

	<h4>User Permissions</h4>

	<?php foreach($users as $u){ ?>
		<div class="row">
		  <div class="users small-12 medium-12 large-12 columns panel radius">

		  	User: 
		  	<a href="<?php echo site_url('user/update/' . $u['id']); ?>">
			  	<?php echo $u['full_name']; ?>
		  	</a>

			  	<div class="panel radius row">
			  	  <div class="small-12 medium-12 large-12 columns">
			  	  	Role: <?php echo $u['role']; ?>

			  	  	<?php 
			  	  		$privileges = $u['privileges'];
			  	  		foreach($privileges as $pv)
			  	  		{
			  	  			$pId = $pv['id'];
			  	  	?>
				  	  	<div userId="<?php echo $u['id']; ?>" 
				  	  		privilegeId="<?php echo $pId; ?>" 
				  	  		class="panel radius row">
				  	  	  <div class="privilege small-6 medium-6 large-6 columns">
				  	  	  	<?php 
				  	  	  		$sChecked = $pv['checked'] ? 'checked' : '';
				  	  	  		echo '<input type="checkbox" ' . 
				  	  	  				$sChecked . 
				  	  	  				' />' . $pv['name'];
				  	  	  	?>
				  	  	  </div>
				  	  	  <div class="permissions small-6 medium-6 large-6 columns">
				  	  	  	<?php 
				  	  	  		foreach($permissions as $perms)
				  	  	  		{
				  	  	  			$sChecked = '';
				  	  	  			$permName = $perms['name'];
				  	  	  			foreach($pv['permissions'] as $pm)
					  	  	  		{
					  	  	  			if($permName == $pm['name'])
					  	  	  			{
					  	  	  				$sChecked = 'checked';
					  	  	  				break;
					  	  	  			}
					  	  	  		}
					  	  	  		//
					  	  	  		echo '<input type="checkbox" 
					  	  	  				value="' . $permName . 
					  	  	  				'" id="' . $perms['id'] . 
					  	  	  				'" ' . $sChecked . 
					  	  	  				' />' . $permName;
				  	  	  		} 
				  	  	  	?>
				  	  	  </div>
				  	  	</div>
			  	  	<?php } ?>

			  	  </div>
			  	</div>

		  </div>
		</div>
	<?php } ?>	

	<script>
		$(document).ready(function(){
			var a = new Auth();
			a.siteUrl = '<?php echo site_url(); ?>';
			a.init();
		});
	</script>
</div>