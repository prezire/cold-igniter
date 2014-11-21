<div id="visitor" class="index">
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>User Id</th>
									<th>Purpose</th>
									<th>Person To Visit</th>
									<th>Company</th>
									<th>Date Time In</th>
									<th>Date Time Out</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($visitor as $v){ ?>      
			<tr>
									<td><?php echo $v->id; ?></td>
									<td><?php echo $v->user_id; ?></td>
									<td><?php echo $v->purpose; ?></td>
									<td><?php echo $v->person_to_visit; ?></td>
									<td><?php echo $v->company; ?></td>
									<td><?php echo $v->date_time_in; ?></td>
									<td><?php echo $v->date_time_out; ?></td>
								<td>
					<a href="<?php echo site_url('visitor/read/' . $v->id); ?>">View</a> | 
					<a href="<?php echo site_url('visitor/update/' . $v->id); ?>">Update</a> | 
					<a href="<?php echo site_url('visitor/delete/' . $v->id); ?>">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>