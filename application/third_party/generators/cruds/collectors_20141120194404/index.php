<div id="collector" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>User Id</th>
									<th>Public Name</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($collectors as $c){ ?>      
			<tr>
									<td><?php echo $c->id; ?></td>
									<td><?php echo $c->user_id; ?></td>
									<td><?php echo $c->public_name; ?></td>
								<td>
					<a href="<?php echo site_url('collector/read/' . $c->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('collector/update/' . $c->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('collector/delete/' . $c->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>