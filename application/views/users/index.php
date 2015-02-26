<div id="user" class="index row">
	<h4>Users</h4>
	<a href="<?php echo site_url('user/create'); ?>"
		class="button tiny">
		New User
	</a>
	<table class="list">
		<thead>
			<tr>
				<th>ID</th>
				<th>Full Name</th>
				<th>Title</th>
				<th>Email</th>
				<th>Date Of Birth</th>
				<th>Address</th>
				<th>Country</th>
				<th>Landline</th>
				<th>Mobile</th>
				<th>Enabled</th>
				<th>Role</th>
				<th class="options">Options</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($users as $u){ ?>
			<tr>
				<td><?php echo $u->id; ?></td>
				<td><?php echo $u->full_name; ?></td>
				<td><?php echo $u->title; ?></td>
				<td><?php echo $u->email; ?></td>
				<td><?php echo $u->date_of_birth; ?></td>
				<td><?php echo $u->address; ?></td>
				<td><?php echo $u->country; ?></td>
				<td><?php echo $u->landline; ?></td>
				<td><?php echo $u->mobile; ?></td>
				<td><?php echo form_checkbox('enabled', null, $u->enabled, 'disabled'); ?></td>
				<td><?php echo $u->role_name; ?></td>
				<td class="options">
					<a href="<?php echo site_url('user/update/' . $u->id); ?>" class="button tiny">Update</a>
					<a href="<?php echo site_url('user/delete/' . $u->id); ?>" class="button tiny alert">Delete</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>