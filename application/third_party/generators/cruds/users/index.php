<div id="user" class="index">
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Username</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<tr>
									<td><?php echo $user->id; ?></td>
									<td><?php echo $user->username; ?></td>
								<td>
					<a href="<?php echo site_url('user/read/' . $user->$id); ?>">View</a> | 
					<a href="<?php echo site_url('user/update/' . $user->$id); ?>">Update</a> | 
					<a href="<?php echo site_url('user/delete/' . $user->$id); ?>">Delete</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>