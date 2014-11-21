<div id="company" class="index row">
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
      <?php foreach($company as $c){ ?>      
			<tr>
									<td><?php echo $c->id; ?></td>
									<td><?php echo $c->name; ?></td>
									<td><?php echo $c->description; ?></td>
									<td><?php echo $c->address; ?></td>
									<td><?php echo $c->landline; ?></td>
									<td><?php echo $c->mobile; ?></td>
									<td><?php echo $c->fax; ?></td>
								<td>
					<a href="<?php echo site_url('company/read/' . $c->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('company/update/' . $c->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('company/delete/' . $c->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>