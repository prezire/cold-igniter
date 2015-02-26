<div id="<?php echo $entity; ?>" class="update row">
  <h4><?php echo humanize($entity); ?></h4>
  <?php 
    $ctrl = str_replace('_', '', $entity);
    $cml = camelize($entity);
  ?>
  <?php echo '<?php'; ?> 
      echo validation_errors();
      echo form_open('<?php echo $ctrl; ?>/update'); 
    <?php echo '?>'; ?>
    
    <div class="row">  
  <?php foreach($fields as $f){ ?>
    <div class="small-12 medium-12 large-12 columns">
          <?php echo humanize($f['name']); ?>: <?php echo $f['field']; ?>
      
      </div>
  <?php } ?>
  </div>
    <div class="row">
      <div class="small-12 medium-12 large-12 columns">
        <a href="<?php echo '<?php echo site_url('; ?>'<?php echo $ctrl; ?>/update/' <?php echo ' . $' . $cml . '->id'; ?>); <?php echo '?>'; ?>" class="button tiny alert">Cancel</a>
        <button class="button tiny">Update</button>
      </div>
    </div>
  </form>
</div>