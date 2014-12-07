<div id="privileges" class="create">
	<div class="row">
		<div class="large-12 columns">
			<h6>Users</h6>
			<?php
				echo form_dropdown
				(
					'users',
					$users,
					null,
					'class="ddUsers"'
				);
			?>
		</div>
	</div>
	<div class="row">
		<div class="large-12 columns">
			<h6>Privileges</h6>
			<table class="privileges">
				<thead>
					<tr>
						<th>Name</th>
						<th>Use</th>
						<th>Permissions</th>
					</tr>
				</thead>
				<?php
					//foreach($privileges as $p){
				?>
				<!--tr>
					<td><?php //echo $p->name; ?></td>
					<input type="checkbox"
					class="cbUse"
					privilageId="<?php //$p->id; ?>" />
					<td>
						<?php
							$CI = get_instance();
							$CI->load->model('permissionmodel', 'pm');
							//$tmpPermissions = array(pm::CREATE, pm::READ, pm::UPDATE, pm::DELETE);
							//foreach($tmpPermissions as $pr){
								//$bPermitted = in_array($pr, $p->permissions) ?'checked' : '';
						?>
						<input type="checkbox"
						class="cbPermit"
						privilageId="<?php //$p->id; ?>"
						<?php //echo $bPermitted; ?> />
						<?php //echo $pr; ?>
						<?php
							//}
						?>
					</td>
				</tr-->
				<?php
					//}
				?>
			</table>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			function Privileges()
			{
				this.baseUrl;
				this.init = function()
				{
					this.baseUrl = "<?php echo site_url(); ?>";
					console.log(this.baseUrl);
					this.setListeners();
					this.fetchPrivileges();
				};
				this.fetchPrivileges = function()
				{
					var i = $('.ddUsers');
					var url = this.baseUrl + 
							'/privilege/readPrivilegesByUserId/' + 
							i.val();
					$.ajax
					(
						{
							url: url,
							type: 'GET',
							success: function(response)
							{
								var r = response;
								for(var a = 0; a < r.privileges.length; a++)
								{
									var p = r.privileges[a];
									var s = '<tr><td>' + 
											p.name + 
											'</td>' + 
											'<td></td>' + 
											'</tr>';
									$('table.privileges tr:last').after(s);
								}
							}
						}
					);
				};
				this.setListeners = function()
				{
					var o = this;
					$('.ddUsers').click(function(){
						o.fetchPrivileges();
					});
					$('.cbUse').click(function(e){
						e.preventDefault();
						var t = $(this);
						var b = t.is(':checked');
					});
					$('.cbPermit').click(function(e){
						e.preventDefault();
						var t = $(this);
						var b = t.is(':checked');
					});
				};
			}
			new Privileges().init();
		});
	</script>
</div>