<div class="container">

	<h2><?php echo $page_title; ?></h2>

	<?php
		if ($pota_all) {
   if($this->session->userdata('user_date_format')) {
      // If Logged in and session exists
      $custom_date_format = $this->session->userdata('user_date_format');
   } else {
      // Get Default date format from /config/cloudlog.php
      $custom_date_format = $this->config->item('qso_date_format');
   }
	?>
	
	<table style="width: 100%" id="potatable" class="potatable table table-sm table-striped table-hover">
	<thead>
		
	<tr>
		<th style="text-align: center"><?php echo $this->lang->line('gen_hamradio_pota_reference') ?></th>
		<th style="text-align: center"><?php echo $this->lang->line('general_word_date') ?></th>
		<th style="text-align: center"><?php echo $this->lang->line('general_word_time') ?></th>
		<th style="text-align: center"><?php echo $this->lang->line('gen_hamradio_callsign') ?></th>
		<th style="text-align: center"><?php echo $this->lang->line('gen_hamradio_band') ?></th>
		<th style="text-align: center"><?php echo $this->lang->line('gen_hamradio_rsts') ?></th>
		<th style="text-align: center"><?php echo $this->lang->line('gen_hamradio_rstr') ?></th>
	</tr>
	</thead>
	
	<tbody>
	<?php
		if ($pota_all->num_rows() > 0) {
			foreach ($pota_all->result() as $row) {
	?>
	
	<tr>
		<td style="text-align: center"><?php echo $row->COL_POTA_REF; ?></td>
		<td style="text-align: center"><?php $timestamp = strtotime($row->COL_TIME_ON); echo date($custom_date_format, $timestamp); ?></td>
		<td style="text-align: center"><?php $timestamp = strtotime($row->COL_TIME_ON); echo date('H:i', $timestamp); ?></td>
		<td style="text-align: center"><?php echo $row->COL_CALL; ?></td>
		<td style="text-align: center"><?php if($row->COL_SAT_NAME != null) { echo $row->COL_SAT_NAME; } else { echo $row->COL_BAND; } ?></td>
		<td style="text-align: center"><?php echo $row->COL_RST_SENT; ?></td>
		<td style="text-align: center"><?php echo $row->COL_RST_RCVD; ?></td>
	</tr>
	<?php
		  }
		}
	?>
	
	</tbody>
	</table>
	<?php } else {
        echo '<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Nothing found!</div>';
    }?>
</div>