<div id="organization" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Description</th>
									<th>Address</th>
									<th>Landline</th>
									<th>Mobile</th>
									<th>Fax</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($organization as $o){ ?>      
			<tr>
									<td><?php echo $o->id; ?></td>
									<td><?php echo $o->name; ?></td>
									<td><?php echo $o->description; ?></td>
									<td><?php echo $o->address; ?></td>
									<td><?php echo $o->landline; ?></td>
									<td><?php echo $o->mobile; ?></td>
									<td><?php echo $o->fax; ?></td>
								<td>
					<a href="<?php echo site_url('organization/read/' . $o->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('organization/update/' . $o->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('organization/delete/' . $o->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>