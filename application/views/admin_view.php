<?php if($this->session->userdata('logged_in')): ?>
	<h2>Admin Homepage</h2>
	<?php echo form_open('users/login'); ?>
		<?php echo form_label('Blood Sugar'); ?>
		<?php
			$data = array(
				'class'			=> 'form-control',
				'name'			=> 'blood_sugar',
				'placeholder'	=> 'Blood Sugar Reading'
			);
		?>
		<?php echo form_input($data); ?>
	<?php echo form_close(); ?>
<?php else: ?>
	<?php redirect('home'); ?>
<?php endif; ?>
