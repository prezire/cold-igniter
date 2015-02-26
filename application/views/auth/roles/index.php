<div id="role" class="index row">
	<h4>Roles</h4>
	<a href="<?php echo site_url('role/create'); ?>" class="button tiny">
		New Role
	</a>
	<table class="list">
		<thead>
			<tr>
				<th>Name</th>
				<th class="options">Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($roles as $r){ ?>      
			<tr>
				<td><?php echo $r->name; ?></td>
				<td class="options">
					<a href="<?php echo site_url('role/update/' . $r->id); ?>" class="button tiny small">Update</a>
					<a href="<?php echo site_url('role/delete/' . $r->id); ?>" class="button tiny alert delete">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>