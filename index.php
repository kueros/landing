<?php
require_once("config/conexion.php");
$sql = mysqli_query($con, "SELECT * FROM iflow_dash.landings;");
#$row = mysqli_fetch_assoc($sql);
$result = [];
while ($row = mysqli_fetch_assoc($sql)) {
	$data[] = $row;
}
if (empty($data)) {
	echo "<script>alert(\"Falta cargar las url's en la tabla landings.\")</script>";
}
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
	<script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyQWRtaW5MVEUlMjAzJTIwJTdDJTIwRGFzaGJvYXJkJTIwMyUyMiUyQyUyMnglMjIlM0EwLjM4MjI0ODY0ODMzMzAxNzY0JTJDJTIydyUyMiUzQTE0NDAlMkMlMjJoJTIyJTNBOTAwJTJDJTIyaiUyMiUzQTUzMyUyQyUyMmUlMjIlM0ExMjkxJTJDJTIybCUyMiUzQSUyMmh0dHBzJTNBJTJGJTJGYWRtaW5sdGUuaW8lMkZ0aGVtZXMlMkZ2MyUyRmluZGV4My5odG1sJTIyJTJDJTIyciUyMiUzQSUyMmh0dHBzJTNBJTJGJTJGYWRtaW5sdGUuaW8lMkZ0aGVtZXMlMkZ2MyUyRmluZGV4Mi5odG1sJTIyJTJDJTIyayUyMiUzQTMwJTJDJTIybiUyMiUzQSUyMlVURi04JTIyJTJDJTIybyUyMiUzQTE4MCUyQyUyMnElMjIlM0ElNUIlNUQlN0Q="></script>
	<script nonce="8a6b1ab9-2679-42ae-a14d-ce790e688dca">
		try {
			(function(w, d) {
				! function(j, k, l, m) {
					j[l] = j[l] || {};
					j[l].executed = [];
					j.zaraz = {
						deferred: [],
						listeners: []
					};
					j.zaraz._v = "5671";
					j.zaraz.q = [];
					j.zaraz._f = function(n) {
						return async function() {
							var o = Array.prototype.slice.call(arguments);
							j.zaraz.q.push({
								m: n,
								a: o
							})
						}
					};
					for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
					j.zaraz.init = () => {
						var q = k.getElementsByTagName(m)[0],
							r = k.createElement(m),
							s = k.getElementsByTagName("title")[0];
						s && (j[l].t = k.getElementsByTagName("title")[0].text);
						j[l].x = Math.random();
						j[l].w = j.screen.width;
						j[l].h = j.screen.height;
						j[l].j = j.innerHeight;
						j[l].e = j.innerWidth;
						j[l].l = j.location.href;
						j[l].r = k.referrer;
						j[l].k = j.screen.colorDepth;
						j[l].n = k.characterSet;
						j[l].o = (new Date).getTimezoneOffset();
						if (j.dataLayer)
							for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({
									...x[1],
									...y[1]
								})), {}))) zaraz.set(w[0], w[1], {
								scope: "page"
							});
						j[l].q = [];
						for (; j.zaraz.q.length;) {
							const z = j.zaraz.q.shift();
							j[l].q.push(z)
						}
						r.defer = !0;
						for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C.startsWith("_zaraz_"))).forEach((B => {
							try {
								j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B))
							} catch {
								j[l]["z_" + B.slice(7)] = A.getItem(B)
							}
						}));
						r.referrerPolicy = "origin";
						r.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[l])));
						q.parentNode.insertBefore(r, q)
					};
					["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener("DOMContentLoaded", zaraz.init)
				}(w, d, "zarazData", "script");
			})(window, document)
		} catch (e) {
			throw fetch("/cdn-cgi/zaraz/t"), e;
		};
	</script>
	<style type="text/css">
		/* Chart.js */
		@keyframes chartjs-render-animation {
			from {
				opacity: .99
			}

			to {
				opacity: 1
			}
		}

		.chartjs-render-monitor {
			animation: chartjs-render-animation 1ms
		}

		.chartjs-size-monitor,
		.chartjs-size-monitor-expand,
		.chartjs-size-monitor-shrink {
			position: absolute;
			direction: ltr;
			left: 0;
			top: 0;
			right: 0;
			bottom: 0;
			overflow: hidden;
			pointer-events: none;
			visibility: hidden;
			z-index: -1
		}

		.chartjs-size-monitor-expand>div {
			position: absolute;
			width: 1000000px;
			height: 1000000px;
			left: 0;
			top: 0
		}

		.chartjs-size-monitor-shrink>div {
			position: absolute;
			width: 200%;
			height: 200%;
			left: 0;
			top: 0
		}
	</style>
</head>

<body class="layout-fixed sidebar-mini">
	<div style="height: 100%; ">
		<nav class="main-header navbar navbar-expand navbar-orange navbar-light">
			<ul class="navbar-nav">
				<li class="nav-item">
					<span class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars" style="color: white"><span style="font-size: 1.25rem; color: white">
								Landing Page Tiendas de IFLOW</span></i>
					</span>
				</li>
			</ul>
		</nav>
		<aside class="main-sidebar sidebar-light-warning" style="border-style: solid; border-color: lightgrey; width: 240!important;">
			<a href="home" style="background-color: black" class="brand-link logo-switch">
				<img src="assets/img/logoIf.png" alt="Iflow Logo" class="brand-image-xs logo-xl" />
			</a>
			<div class="sidebar">


				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<?php foreach ($data as $item) : ?>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<?php echo $item['icono']; ?>
									<p>
										<?php echo $item['plataforma']; ?>
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview" style="display: none;">
									<li class="nav-item">
										<a href="<?php echo $item['url_instalador']; ?>" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Instalador</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo $item['url_dashboard']; ?>" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Dashboard</p>
										</a>
									</li>
								</ul>
							</li>
						<?php endforeach; ?>
					</ul>
				</nav>
			</div>
		</aside>
		<div class="content-wrapper" style="padding-top: 25px">
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3 col-6">
							<div class="small-box bg-info">
								<div class="inner">
									<h3>150</h3>
									<p>Nuevas Órdenes</p>
								</div>
								<div class="icon">
									<i class="ion ion-bag"></i>
								</div>
								<a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<div class="small-box bg-success">
								<div class="inner">
									<h3>53<sup style="font-size: 20px">%</sup></h3>
									<p>Nuevos Clientes</p>
								</div>
								<div class="icon">
									<i class="ion ion-stats-bars"></i>
								</div>
								<a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<div class="small-box bg-warning">
								<div class="inner">
									<h3>44</h3>
									<p>Nuevas Tiendas Activas</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-add"></i>
								</div>
								<a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<div class="small-box bg-danger">
								<div class="inner">
									<h3>65</h3>
									<p>Nuevas Instalaciones</p>
								</div>
								<div class="icon">
									<i class="ion ion-pie-graph"></i>
								</div>
								<a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
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
											<i class="fas fa-square text-primary"></i> Esta Semana
										</span>
										<span>
											<i class="fas fa-square text-gray"></i> Última Semana
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card">
								<div class="card-header border-0">
									<div class="d-flex justify-content-between">
										<h3 class="card-title">Órdenes Fullfillment</h3>
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
												<i class="fas fa-arrow-up"></i> 33.1%
											</span>
											<span class="text-muted">Desde el último mes</span>
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
											<i class="fas fa-square text-primary"></i> Este año
										</span>
										<span>
											<i class="fas fa-square text-gray"></i> Último año
										</span>
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