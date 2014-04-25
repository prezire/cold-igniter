<div id="<?php echo $entity; ?>" class="update">
  <?php 
    $ctrl = str_replace('_', '', $entity);
    $cml = camelize($entity);
  ?>
  <?php echo '<?php'; ?> echo form_open('<?php echo $ctrl; ?>/update'); <?php 
    echo '?>'; 
  ?>
    <?php foreach($fields as $f){ ?>
      
      <?php echo humanize($f['name']); ?>: <?php echo $f['field']; ?>
      
    <?php } ?>
    <a href="<?php echo '<?php echo site_url('; ?>'<?php echo $ctrl; ?>/read/' <?php echo ' . $' . $cml . '->id'; ?>); <?php echo '?>'; ?>">Cancel</a> | 
    <button>Update</button>
  </form>
</div>