<div id="organization_member" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>Organization Id</th>
									<th>User Id</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($organizationMember as $o){ ?>      
			<tr>
									<td><?php echo $o->id; ?></td>
									<td><?php echo $o->organization_id; ?></td>
									<td><?php echo $o->user_id; ?></td>
								<td>
					<a href="<?php echo site_url('organizationmember/read/' . $o->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('organizationmember/update/' . $o->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('organizationmember/delete/' . $o->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>