<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>NP Infotech</title>
  <?php $this->load->view('css');?>
</head>
<body>
<div class="wrapper">
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php $this->load->view('navbar');?>
<?php $this->load->view('asid_bar');?>
	<div class="content-wrapper">
		<div class="row" style="padding: 10px;">
			<div class="col-sm-12 text-center text-primary">
					<h4>Appointment Master</h4>
			</div>
		</div>

	</div>
</div>
<?php $this->load->view('footer');?>
<?php $this->load->view('javascript');?>

</body>
</html>
