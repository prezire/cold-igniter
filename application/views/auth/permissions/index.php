<div id="permission" class="index">
	<h4>Permissions</h4>
	<a href="<?php echo site_url('permission/create'); ?>" class="button tiny">
		New Permission
	</a>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($permissions as $p){ ?>
				<tr>
					<td><?php echo $p->name; ?></td>
					<td>
						<a href="<?php echo site_url('permission/update/' . $p->id); ?>" class="button tiny">Update</a>
						<a href="<?php echo site_url('permission/delete/' . $p->id); ?>" class="button tiny alert delete">Delete</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>