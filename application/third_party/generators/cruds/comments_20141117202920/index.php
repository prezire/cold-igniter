<div id="comment" class="index row">
  <h4></h4>
	<table>
		<thead>
			<tr>
									<th>Id</th>
									<th>From User Id</th>
									<th>To User Id</th>
									<th>Comment</th>
									<th>Date Time</th>
									<th>Approved</th>
								<th>Options</th>
			</tr>
		</thead>
		<tbody>
      <?php foreach($comment as $c){ ?>      
			<tr>
									<td><?php echo $c->id; ?></td>
									<td><?php echo $c->from_user_id; ?></td>
									<td><?php echo $c->to_user_id; ?></td>
									<td><?php echo $c->comment; ?></td>
									<td><?php echo $c->date_time; ?></td>
									<td><?php echo $c->approved; ?></td>
								<td>
					<a href="<?php echo site_url('comment/read/' . $c->id); ?>" class="button radius small">View</a>
					<a href="<?php echo site_url('comment/update/' . $c->id); ?>" class="button radius small">Update</a>
					<a href="<?php echo site_url('comment/delete/' . $c->id); ?>" class="button radius small alert">Delete</a>
				</td>
			</tr>
      <?php } ?>      
		</tbody>
	</table>
</div>