<div id="member" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>User Id</th>
									<th>Organization Id</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($members as $m){ ?>      
			<tr>
									<td><?php echo $m->id; ?></td>
									<td><?php echo $m->user_id; ?></td>
									<td><?php echo $m->organization_id; ?></td>
								<td>
					<a href="<?php echo site_url('member/read/' . $m->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('member/update/' . $m->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('member/delete/' . $m->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>