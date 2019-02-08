<!DOCTYPE html>
<html lang="en">
<head>
  <meta chartset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Login App</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <script src="<?php echo base_url(); ?>assets/js/jquery.js" charset="utf-8"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container-fluid">
    <!--div class="col-xs-3">
      <?php //$this->load->view('users/login_view')?>
    </div-->
    <div class="col-xs-12">
      <?php $this->load->view($main_view); ?>
    </div>
  </div>
</body>
</html>
