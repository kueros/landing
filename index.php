<?php
error_reporting(0);

#Se cargan los datos para conectar a la base de datos
require_once("config/conexion.php");
$i = 1;
#Se traen desde la tabla landings los datos para armar el menú de acceso
$sql = mysqli_query($con, "SELECT * FROM landings;");
while ($row = mysqli_fetch_assoc($sql)) {
	$data[] = $row;
}
if (empty($data)) {
	echo "<script>alert(\"Falta cargar las url's en la tabla landings.\")</script>";
}
// Leer el archivo JSON
$json_data = file_get_contents('data.json');

// Decodificar el JSON
$tarjetas = json_decode($json_data, true);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Iflow Landing Page</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="/landing/assets/favicon.ico" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link rel="stylesheet" href="/landing/css/OverlayScrollbars.min.css" />
	<link rel="stylesheet" href="/landing/css/adminlte.min.css" />
	<link rel="stylesheet" href="/landing/css/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" />
	<link rel="stylesheet" type="text/css" href="/landing/css/app.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">

</head>

<body class="layout-fixed sidebar-mini">
	<style>
		.tooltip-container {
			position: relative;
			display: inline-block;
		}

		.tooltip-text {
			visibility: hidden;
			width: 200px;
			background-color: #000;
			color: #fff;
			text-align: center;
			border-radius: 6px;
			padding: 5px;
			position: absolute;
			z-index: 1;
			bottom: 75%;
			/* Posiciona el tooltip encima del elemento */
			left: 50%;
			transform: translateX(-50%);
			opacity: 0;
			transition: opacity 0.3s;
		}

		.tooltip-container:hover .tooltip-text {
			visibility: visible;
			opacity: 1;
		}

		.btn {
			padding: 20px;
		}
	</style>
	<div style="height: 100%; ">
		<nav class="main-header navbar navbar-expand navbar-orange navbar-light" style="margin-left: 175px;">
			<ul class="navbar-nav">
				<li class="nav-item">
					<span class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars" style="color: white">
							<span style="font-size: 1.25rem; color: white">
								Landing Page Tiendas de IFLOW
							</span>
						</i>
					</span>
				</li>
			</ul>
		</nav>
		<aside class="main-sidebar sidebar-light-warning" style="border-style: solid; border-color: lightgrey; width: 175px!important;">
			<a href="home" style="background-color: black" class="brand-link logo-switch">
				<img src="assets/img/logoIf.png" alt="Iflow Logo" class="brand-image-xs logo-xl" />
			</a>
			<!-- INICIO SIDEBAR -->
			<div class="sidebar">
				<div class="btn-group-vertical" role="group" aria-label="Vertical button group" style="display: flex; margin-top:20px;">
					<!-- FOREACH QUE RECORRE LA TABLA PARA ARMAR EL MENÚ LATERAL -->
					<?php foreach ($data as $item) : ?>
						<div class="btn-group tooltip-container" role="group" style="display: flex;">
							<button id="btnGroupVerticalDrop<?php echo $i; ?>" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:-8px;">
								<span class="tooltip-text">
									<?php echo $item['plataforma']; ?>
								</span>
								<img src="assets/img/<?php echo $item['icono']; ?>" />
							</button>
							<div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop<?php echo $i; ?>" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
								<a class="dropdown-item" href="<?php echo $item['url_instalador']; ?>">Instalador</a>
								<a class="dropdown-item" href="<?php echo $item['url_dashboard']; ?>">Dashboard</a>
							</div>
						</div>
					<?php ++$i;
					endforeach; ?>
				</div>
			</div>
		</aside>
		<!-- INICIO PAGINA ESTADISTICAS -->
		<div class="content-wrapper" style="padding-top: 25px; margin-left:175px;">
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<?php
						foreach ($tarjetas as $key => $dato) :
						?>
							<div class="col-lg-3 col-6">
								<div class="small-box bg-success">
									<div class="overlay">
										<i></i>
									</div>
									<div class="inner">
										<h3><?php echo $dato["exito"]["datos"]; ?></h3>
										<p><?php echo $dato["exito"]["tipo_orden"]; ?></p>
									</div>
									<div class="icon">
										<i class="fas fa-check"></i>
									</div>
									<!--a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a-->
								</div>
							</div>

							<div class="col-lg-3 col-6">
								<div class="small-box bg-info">
									<div class="overlay">
										<i></i>
									</div>
									<div class="inner">
										<h3><?php echo $dato["entregadas"]["datos"]; ?></h3>
										<p><?php echo $dato["entregadas"]["tipo_orden"]; ?></p>
									</div>
									<div class="icon">
										<i class="fas fa-thumbs-up"></i>
									</div>
									<!--a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a-->
								</div>
							</div>

							<div class="col-lg-3 col-6">
								<div class="small-box bg-warning">
									<div class="overlay">
										<i></i>
									</div>
									<div class="inner">
										<h3><?php echo $dato["transito"]["datos"]; ?></h3>
										<p><?php echo $dato["transito"]["tipo_orden"]; ?></p>
									</div>
									<div class="icon">
										<i class="fas fa-truck-moving"></i>
									</div>
									<!--a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a-->
								</div>
							</div>

							<div class="col-lg-3 col-6">
								<div class="small-box bg-danger">
									<div class="overlay">
										<i></i>
									</div>
									<div class="inner">
										<h3><?php echo $dato["no_procesadas"]["datos"]; ?></h3>
										<p><?php echo $dato["no_procesadas"]["tipo_orden"]; ?></p>
									</div>
									<div class="icon">
										<i class="fas fa-exclamation-triangle"></i>
									</div>
									<!--a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a-->
								</div>
							</div>

						<?php endforeach;
						?>
					</div>

					<div class="row">

						<div class="col-lg-6">
							<div class="card">
								<div class="card-header border-0">
									<div class="d-flex justify-content-between">
										<h3 class="card-title">Órdenes Diarias Enviadas</h3>
										<a href="javascript:void(0);">Ver Reporte</a>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<p class="d-flex flex-column">
											<span class="text-bold text-lg">820</span>
											<span>Órdenes Enviadas Exitosamente</span>
										</p>
										<p class="ml-auto d-flex flex-column text-right">
											<span class="text-success">
												<i class="fas fa-arrow-up"></i> 12.5%
											</span>
											<span class="text-muted">Desde la última semana</span>
										</p>
									</div>
									<div class="position-relative mb-4">
										<div class="chartjs-size-monitor">
											<div class="chartjs-size-monitor-expand">
												<div class=""></div>
											</div>
											<div class="chartjs-size-monitor-shrink">
												<div class=""></div>
											</div>
										</div>
										<canvas id="visitors-chart" height="440" style="display: block; height: 200px; width: 451px;" width="992" class="chartjs-render-monitor"></canvas>
									</div>
									<div class="d-flex flex-row justify-content-end">
										<span class="mr-2">
											<i class="fas fa-square " style="color: #78B258; border-color: #78B258"></i> Shopify
										</span>
										<span class="mr-2">
											<i class="fas fa-square" style="color: #0050C3; border-color: #0050C3"></i> TiendaNube
										</span>
										<span class="mr-2">
											<i class="fas fa-square" style="color: #9A5C8E; border-color: #9A5C8E"></i> WooCommerce
										</span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="card">
								<div class="card-header border-0">
									<div class="d-flex justify-content-between">
										<h3 class="card-title">Ordenes</h3>
										<a href="javascript:void(0);">Ver Reporte</a>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<p class="d-flex flex-column">
											<span class="text-bold text-lg">230.00</span>
											<span>Órdenes en el tiempo</span>
										</p>
										<p class="ml-auto d-flex flex-column text-right">
											<span class="text-success">
												<i class="fas fa-arrow-up"></i> 3.1%
											</span>
											<span class="text-muted">últimos 6 meses</span>
										</p>
									</div>
									<div class="position-relative mb-4">
										<div class="chartjs-size-monitor">
											<div class="chartjs-size-monitor-expand">
												<div class=""></div>
											</div>
											<div class="chartjs-size-monitor-shrink">
												<div class=""></div>
											</div>
										</div>
										<canvas id="sales-chart" height="440" style="display: block; height: 200px; width: 451px;" width="992" class="chartjs-render-monitor"></canvas>
									</div>
									<div class="d-flex flex-row justify-content-end">
										<span class="mr-2">
											<i class="fas fa-square " style="color: #78B258; border-color: #78B258"></i> Shopify
										</span>
										<span class="mr-2">
											<i class="fas fa-square" style="color: #0050C3; border-color: #0050C3"></i> TiendaNube
										</span>
										<span class="mr-2">
											<i class="fas fa-square" style="color: #9A5C8E; border-color: #9A5C8E"></i> WooCommerce
										</span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="card">
								<div class="card-header border-0">
									<div class="d-flex justify-content-between">
										<h3 class="card-title">Ordenes</h3>
										<a href="javascript:void(0);">Ver Reporte</a>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<p class="d-flex flex-column">
											<span class="text-bold text-lg">230.00</span>
											<span>Órdenes en el tiempo</span>
										</p>
										<p class="ml-auto d-flex flex-column text-right">
											<span class="text-success">
												<i class="fas fa-arrow-up"></i> 3.1%
											</span>
											<span class="text-muted">últimos 6 meses</span>
										</p>
									</div>
									<div class="position-relative mb-4">
										<div class="chartjs-size-monitor">
											<div class="chartjs-size-monitor-expand">
												<div class=""></div>
											</div>
											<div class="chartjs-size-monitor-shrink">
												<div class=""></div>
											</div>
										</div>
										<canvas id="piechart1" height="440" style="display: block; height: 200px; width: 451px;" width="992" class="chartjs-render-monitor"></canvas>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="card">
								<div class="card-header border-0">
									<div class="d-flex justify-content-between">
										<h3 class="card-title">Ordenes</h3>
										<a href="javascript:void(0);">Ver Reporte</a>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<p class="d-flex flex-column">
											<span class="text-bold text-lg">230.00</span>
											<span>Órdenes en el tiempo</span>
										</p>
										<p class="ml-auto d-flex flex-column text-right">
											<span class="text-success">
												<i class="fas fa-arrow-up"></i> 3.1%
											</span>
											<span class="text-muted">últimos 6 meses</span>
										</p>
									</div>
									<div class="position-relative mb-4">
										<div class="chartjs-size-monitor">
											<div class="chartjs-size-monitor-expand">
												<div class=""></div>
											</div>
											<div class="chartjs-size-monitor-shrink">
												<div class=""></div>
											</div>
										</div>
										<canvas id="piechart2" height="440" style="display: block; height: 200px; width: 451px;" width="992" class="chartjs-render-monitor"></canvas>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="card">
								<div class="card-header border-0">
									<div class="d-flex justify-content-between">
										<h3 class="card-title">Ordenes</h3>
										<a href="javascript:void(0);">Ver Reporte</a>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<p class="d-flex flex-column">
											<span class="text-bold text-lg">230.00</span>
											<span>Órdenes en el tiempo</span>
										</p>
										<p class="ml-auto d-flex flex-column text-right">
											<span class="text-success">
												<i class="fas fa-arrow-up"></i> 3.1%
											</span>
											<span class="text-muted">últimos 6 meses</span>
										</p>
									</div>
									<div class="position-relative mb-4">
										<div class="chartjs-size-monitor">
											<div class="chartjs-size-monitor-expand">
												<div class=""></div>
											</div>
											<div class="chartjs-size-monitor-shrink">
												<div class=""></div>
											</div>
										</div>
										<canvas id="piechart3" height="440" style="display: block; height: 200px; width: 451px;" width="992" class="chartjs-render-monitor"></canvas>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/scripts.js"></script>
</body>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="dist/js/adminlte.js?v=3.2.0"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>


</html>