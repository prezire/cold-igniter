<div id="search" class="results">
	<h4>Search Results</h4>
	<div class="row">
		<?php foreach ($items as $i){ ?>
			<div class="small-12 medium-12 large-12 columns">
				<a href="<?php echo $i['href']; ?>">
					<?php echo $i['title']; ?>
				</a>
				<hr />
				<?php echo $i['description']; ?>
			</div>
		<?php }  ?>
	</div>
</div>