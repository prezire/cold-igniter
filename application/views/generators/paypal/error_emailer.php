{errorMessage} <br /><br />
<?php $i = $this->input; ?>
Product: <?php echo $i->post('item_number'); ?><br />
Currency: <?php echo $i->post('mc_currency'); ?><br />
Price : <?php echo $i->post('mc_gross'); ?><br />
Status: <?php echo $i->post('payment_status'); ?><br />