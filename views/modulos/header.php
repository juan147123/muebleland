<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>MuebleLand</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
	<meta content="Themesbrand" name="author" />
	<!-- Bootstrap Css -->
	<link href="views/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	
	<!-- App Css-->
	<link href="views/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

	<!-- DataTables -->
	<link href="views/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="views/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

	<!-- Responsive datatable examples -->
	<link href="views/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">

</head>

<body>
	<?php
	if (isset($_GET['ruta'])) {
		if ($_GET['ruta'] != "login" ) {
			echo ('<div class="wrapper">
		');
			include_once "menu.php";
		} else {
			echo ('
			<style>
				body{
					background-image:url("views/images/fondo_muebleland.jpg");
					background-size: cover;
					background-repeat: no-repeat;
				}
			</style>
			');
		}
	}else{
		echo ('
			<style>
				body{
					background-image:url("views/images/fondo_muebleland.jpg");
					background-size: cover;
					background-repeat: no-repeat;
				}
			</style>
			');
	}
	?>