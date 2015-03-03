<div id="gallery" class="index">
	<h4>Gallery</h4>
	<?php echo form_open_multipart('gallery/create'); ?>
		<div class="row panel">
		  <div class="small-12 medium-12 large-12 columns">
		  	Multiple Upload
		  </div>
		  <div class="small-12 medium-12 large-12 columns">
		  	<input type="file" name="files[]" multiple />
		  	<input type="submit" 
				name="submit" 
				class="button tiny" 
				value="Upload" />
		 </div>
		</div>
	</form>
	<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4">
		<?php 
			foreach ($images as $i)
			{ 
				$img = base_url('public/uploads/' . $i->filename);
		?>
			<li>
				<a href="<?php echo $img; ?>"  
					class="image" 
					data-lightbox="image" 
					data-title="<?php echo $i->caption; ?>">
					<i class="fa fa-search"></i>
					<img src="<?php echo $img; ?>"></a>
				</a>
				<a href="<?php echo site_url('gallery/update/' . $i->id); ?>" 
					class="button tiny"/>
					Edit
				</a>
				<a href="<?php echo site_url('gallery/delete/' . $i->id); ?>" 
					class="button tiny alert delete"/>
					Delete
				</a>
			</li>		
		<?php } ?>
	</ul>
</div>