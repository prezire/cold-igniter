<div id="gallery" class="index">
	<h4>Gallery</h4>
	<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4">
		<?php foreach ($images as $i){ ?>
			<li>
				<a href="<?php echo base_url('public/images/uploads/' . $i->filename); ?>"  
					data-title="<?php echo $i->caption; ?>">
					<?php echo $i->description; ?>
				</a>
			</li>		
		<?php } ?>
	</ul>
</div>