<div id="permission" class="index">
	<h4>Privileges</h4>
	<a href="<?php echo site_url('privilege/create'); ?>" class="button tiny">
		New Privilege
	</a>
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($privileges as $p){ ?>
				<tr>
					<td><?php echo $p->name; ?></td>
					<td>
						<a href="<?php echo site_url('privilege/update/' . $p->id); ?>" class="button tiny">Update</a>
						<a href="<?php echo site_url('privilege/delete/' . $p->id); ?>" class="button tiny alert delete">Delete</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>