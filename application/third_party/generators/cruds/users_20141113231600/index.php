<div id="user" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Full Name</th>
									<th>Email</th>
									<th>Password</th>
									<th>Address</th>
									<th>Title</th>
									<th>Enabled</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($user as $u){ ?>      
			<tr>
									<td><?php echo $u->id; ?></td>
									<td><?php echo $u->full_name; ?></td>
									<td><?php echo $u->email; ?></td>
									<td><?php echo $u->password; ?></td>
									<td><?php echo $u->address; ?></td>
									<td><?php echo $u->title; ?></td>
									<td><?php echo $u->enabled; ?></td>
								<td>
					<a href="<?php echo site_url('user/read/' . $u->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('user/update/' . $u->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('user/delete/' . $u->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>