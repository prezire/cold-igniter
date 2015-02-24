<div id="student" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Full Name</th>
									<th>Email</th>
									<th></th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($students as $s){ ?>      
			<tr>
									<td><?php echo $s->id; ?></td>
									<td><?php echo $s->full_name; ?></td>
									<td><?php echo $s->email; ?></td>
									<td><?php echo $s->; ?></td>
								<td>
					<a href="<?php echo site_url('student/read/' . $s->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('student/update/' . $s->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('student/delete/' . $s->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>