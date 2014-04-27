<div id="<?php echo $entity; ?>" class="read">
  <?php 
    $ctrl = str_replace('_', '', $entity);
    $cml = camelize($entity);
  ?>
    <?php foreach($fields as $f){ ?>
      
      <?php echo humanize($f['name']); ?>: <?php echo '<?php echo ' . $cml . '->' . $f['name'] . '; ?>'; ?>
      
    <?php } ?>
    <a href="<?php echo '<?php echo site_url('; ?>'<?php echo $ctrl; ?>'); <?php echo '?>'; ?>">Back</a> | 
    <a href="<?php echo '<?php echo site_url('; ?>'<?php echo $ctrl; ?>/update'); <?php echo '?>'; ?>">Update</a>
  </form>
</div>