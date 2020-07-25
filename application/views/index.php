<!DOCTYPE html>
<meta http-equiv=refresh content=60;url=<?php echo site_url('Home');?>>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Rekapitulasi Keuangan</title>
	<?php include "bootstrap_css.php" ?>
	<?php include "bootstrap_js.php" ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/home.css">

</head>
<body>

	<?php
	date_default_timezone_set('Asia/Jakarta');
	$date = Date("d-m-Y, H:i:s");

	$a = Date('H:i');

	if($a <= '10:21') {
		include "user_navbar.php";
	} 
	else if ($a >= '10:22'){
		include "sidebar.php";
	}
	?>

	
	
	<!-- Bootstrap row -->

	<!-- MAIN -->


</div><!-- body-row END -->
</body>

</html>