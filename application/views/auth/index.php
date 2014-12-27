<div id="auth" class="index row">
	<div data-alert class="alert-box hide">
		<a href="#" class="close">&times;</a>
	</div>
	<div class="row">
		<div class="large-1 columns">
			Users:
		</div>
		<div class="large-11 columns">
			<?php echo form_dropdown('users', $users, null, 'class="ddUsers"'); ?>
		</div>
	</div>
	<div class="row">
		<div class="large-1 columns">
			Privileges:
		</div>
		<div class="large-11 columns">
			<div class="privileges">
				<ul></ul>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			var a = new Auth();
			a.baseUrl = "<?php echo site_url(); ?>";
			a.init();
		});
	</script>
</div>