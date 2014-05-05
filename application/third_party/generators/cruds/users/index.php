<div id="user" class="index">
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Full Name</th>
									<th>Title</th>
									<th>Address</th>
									<th>Postal Code</th>
									<th>Email</th>
									<th>Mobile</th>
									<th>Ic Number</th>
									<th></th>
									<th>Website</th>
									<th>Facebook</th>
									<th>Biography</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<tr>
									<td><?php echo $user->id; ?></td>
									<td><?php echo $user->full_name; ?></td>
									<td><?php echo $user->title; ?></td>
									<td><?php echo $user->address; ?></td>
									<td><?php echo $user->postal_code; ?></td>
									<td><?php echo $user->email; ?></td>
									<td><?php echo $user->mobile; ?></td>
									<td><?php echo $user->ic_number; ?></td>
									<td><?php echo $user->; ?></td>
									<td><?php echo $user->website; ?></td>
									<td><?php echo $user->facebook; ?></td>
									<td><?php echo $user->biography; ?></td>
								<td>
					<a href="<?php echo site_url('user/read/' . $user->$id); ?>">View</a> | 
					<a href="<?php echo site_url('user/update/' . $user->$id); ?>">Update</a> | 
					<a href="<?php echo site_url('user/delete/' . $user->$id); ?>">Delete</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>