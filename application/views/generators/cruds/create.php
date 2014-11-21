<div id="<?php echo $entity; ?>" class="create row">
  <h4></h4>
  <?php $ctrl = str_replace('_', '', $entity); ?>
  <?php echo '<?php'; ?> 
    echo validation_errors();
    echo form_open('<?php echo $ctrl; ?>/create'); 
    <?php echo '?>'; ?>
    <?php foreach($fields as $f){ ?>
      
      <?php echo humanize($f['name']); ?>: <?php echo $f['field']; ?>
      
    <?php } ?>
    <a href="<?php echo '<?php echo site_url('; ?>'<?php echo $ctrl; ?>'); <?php echo '?>'; ?>" class="button radius small alert">Cancel</a>
    <button class="button radius small">Create</button>
  </form>
</div>