<div id="company_member" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Company Id</th>
									<th>Editor Id</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($companyMember as $c){ ?>      
			<tr>
									<td><?php echo $c->id; ?></td>
									<td><?php echo $c->company_id; ?></td>
									<td><?php echo $c->editor_id; ?></td>
								<td>
					<a href="<?php echo site_url('companymember/read/' . $c->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('companymember/update/' . $c->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('companymember/delete/' . $c->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>