<div id="position_alert" class="index row">
	  <h4>Position Alerts</h4>
  	<a href="<?php echo base_url('positionalert/create'); ?>" class="button tiny">New Position Alert</a>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Email</th>
				<th>Frequency</th>
				<th>Keywords</th>
				<th>Country</th>
				<th>Date Time Created</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($positionAlerts as $p){ ?>      
			<tr>
				<td><?php echo $p->id; ?></td>
				<td><?php echo $p->email; ?></td>
				<td><?php echo $p->frequency; ?></td>
				<td><?php echo $p->keywords; ?></td>
				<td><?php echo $p->country; ?></td>
				<td><?php echo $p->date_time_created; ?></td>
				<td>
					<a href="<?php echo site_url('positionalert/update/' . $p->id); ?>" class="button tiny">Update</a>
					<a href="<?php echo site_url('positionalert/delete/' . $p->id); ?>" class="button tiny alert delete">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>