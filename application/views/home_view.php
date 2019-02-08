
<?php if($this->session->flashdata('login_success')): ?>
  <div class="alert alert-success">
    <?php echo $this->session->flashdata('login_success'); ?>
  </div>
<?php endif; ?>
<?php if($this->session->flashdata('login_failed')): ?>
  <div class="alert alert-danger">
    <?php echo $this->session->flashdata('login_failed'); ?>
  </div>
<?php endif; ?>
<h1>Calculate Your Dose</h1>
<?php echo form_open('home'); ?>
	<?php echo form_label('Blood Sugar'); ?>
	<?php
		$data = array(
			'id'			=> 'bs',
			'class'			=> 'form-control',
			'name'			=> 'blood_sugar',
			'placeholder'	=> 'Blood Sugar Reading'
		);
	?>
	<?php echo form_input($data); ?>
	<div class="col-xs-2">
		<button id="bs-btn"	style="margin-top: 20px;" type="button" class="btn btn-success">Calculate</button>
	</div>
	<div class="col-xs-5">
		<div style="margin-top: 20px;" id="output" role="alert">
		</div>
	</div>
	<div class="col-xs-5">
		<div style="margin-top: 20px;" class="alert alert-success" role="alert">
			<p>Formula: (Bloodsugar - 150)/50.</p>
		</div>
	</div>
<?php echo form_close(); ?>
<script>
	$(document).ready(function() {
		function getInUnits($input) {
			var inUnits = ($input - 150)/50;
			return inUnits;
		}

		$("#bs-btn").click(
			function() {
				var input = $("#bs").val();
				var inUnitsOutput = getInUnits(input);
				$("#output").addClass("alert alert-danger");
				$("#output").append("You need to take " + inUnitsOutput + " units of insulin.");
			}
		);
	});
</script>