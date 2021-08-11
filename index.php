<?php 
	session_start();
?>

	<?php

	// if (!isset($_SESSION)) {
	// };


	// if (!isset($_SESSION['login']) && isset($_SESSION['login-nasabah'])){
	// 	header('Location: login.php');
	// };

	// if (!isset($_SESSION['login-nasabah']) && isset($_SESSION['login'])){
	// 	header('Location: login-nasabah.php');
	// };


	if (!isset($_SESSION['jenis'])){
		header('Location: login-nasabah.php');
	}
			// if (isset($_SESSION['type']) == 'admin') {
			// 	header('Location: login.php');
			// }
			// if (isset($_SESSION['type']) == 'nasabah') {
			// 	header('Location: login-nasabah.php');
			// }

	include('template/header.php');


	$saldo  = mysqli_query($conn, "SELECT saldo FROM tabungan JOIN nasabah ON tabungan.kode=nasabah.kode order by kode_tabungan asc");
	$nama_kelas = mysqli_query($conn, "SELECT nama_kelas FROM tabungan JOIN nasabah ON tabungan.kode=nasabah.kode order by kode_tabungan asc");
	$nasabah =  mysqli_query($conn, "SELECT Count(*) as count from nasabah");
	$sampah = mysqli_query($conn, "SELECT Count(*) as count from sampah");
	$setor = mysqli_query($conn, "SELECT SUM(quantity*harga) as total from setor");
	$tarik = mysqli_query($conn, "SELECT SUM(jumlah_tarik) as jumlah_tarik from tarik");
	$today = mysqli_query($conn, "SELECT setor.* ,nasabah.nama_kelas, sampah.nama_sampah from setor JOIN nasabah ON setor.kode=nasabah.kode JOIN sampah ON setor.kode_sampah=sampah.kode_sampah JOIN tabungan ON setor.kode_tabungan=tabungan.kode_tabungan where tgl_setor=CURRENT_DATE() ");
	$today2 = mysqli_query($conn, "SELECT tarik.* ,nasabah.nama_kelas from tarik JOIN nasabah ON tarik.kode=nasabah.kode JOIN tabungan ON tarik.kode_tabungan=tabungan.kode_tabungan where tgl_tarik=CURRENT_DATE() ");


	$notarik = mysqli_num_rows($today2) > 0;


	$notarik2 = mysqli_num_rows($today) > 0;



	// $result = mysqli_query($conn, "SELECT * FROM  nasabah");
	// $result2 = mysqli_query($conn, "SELECT * FROM  sampah  JOIN jenis_sampah ON sampah.kode_jenis=jenis_sampah.kode_jenis");
	// $result3 = mysqli_query($conn, "SELECT *  FROM  tabungan JOIN nasabah ON tabungan.kode=nasabah.kode");
	// $result4 = mysqli_query($conn, "SELECT * FROM  setor  JOIN nasabah ON setor.kode=nasabah.kode JOIN sampah ON setor.kode_sampah=sampah.kode_sampah JOIN tabungan ON setor.kode_tabungan=tabungan.kode_tabungan");
	// $result5 = mysqli_query($conn, "SELECT * FROM  tarik  JOIN nasabah ON tarik.kode=nasabah.kode JOIN tabungan ON tarik.kode_tabungan=tabungan.kode_tabungan");

	?>



<body>
	<div class="wrapper">

		<?php include('template/sidebar.php') ?>


		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">SELAMAT DATANG</h2>
								<h5 class="text-white op-7 mb-2">BANK SAMPAH SMP N 5 KUBUNG</h5>
							</div>
							<!-- <div class="ml-md-auto py-2 py-md-0">
								<a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
								<a href="#" class="btn btn-secondary btn-round">Add Customer</a>
							</div> -->
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Statistik Keseluruhan</div>
									<div class="card-category">Informasi Harian Mengenai Statistik Sistem</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">Jumlah Nasabah</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">Jumlah Sampah</h6>
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Nasabah dengan Saldo Terbanyak</div>
									<div class="row py-3">
										<div class="col-md-4 d-flex flex-column justify-content-around">
											<div>
												<h6 class="fw-bold text-uppercase text-success op-8">Total Setoran</h6>
												<h3 class="fw-bold"><?php while ($c = mysqli_fetch_array($setor)) {
																							echo $c['total'];
																						} ?></h3>
											</div>
											<div>
												<h6 class="fw-bold text-uppercase text-danger op-8">Total Penarikan</h6>
												<h3 class="fw-bold"><?php while ($d = mysqli_fetch_array($tarik)) {
																							echo $d['jumlah_tarik'];
																						} ?></h3>
											</div>
										</div>
										<div class="col-md-8">
											<div id="chart-container">
												<canvas id="totalIncomeChart"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Penyetoran Hari Ini</div>
									<div class="card-category">Informasi Harian Mengenai Transaksi Nasabah</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<!-- <div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">Jumlah Nasabah</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">Jumlah Sampah</h6>
										</div> -->
										<?php

										if ($notarik2) {

										?>
											<div class="table-responsive">
												<table id="add-row" class="display table table-striped table-hover">
													<thead style="background-color: #1572e8; color:white">
														<tr>
															<th>Nama Kelas</th>
															<th>Nama Sampah</th>
															<th>Berat (Kg)</th>
															<th>Harga /kg</th>
															<th>Total</th>
														</tr>
													</thead>

													<tbody>
														<?php

														// $no = 1;
														while ($user_data = mysqli_fetch_array($today)) {

														?>
															<tr>
																<td><?php echo $user_data['nama_kelas']; ?></td>
																<td><?php echo $user_data['nama_sampah']; ?></td>
																<td><?php echo $user_data['quantity']; ?></td>
																<td><?php echo $user_data['harga']; ?></td>
																<td><?php echo $user_data['harga'] *  $user_data['quantity']; ?></td>


															</tr>
														<?php
														}
														?>
													</tbody>
												</table>

											</div>



										<?php
										} else {

										?>
											<div class="alert alert-danger" style="width:50%; text-align:center" role="alert">
												Tidak Ada Penyetoran
											</div>


										<?php

										}

										?>
									</div>
								</div>
							</div>

						</div>


						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Penarikan Hari Ini</div>
									<div class="card-category">Informasi Harian Mengenai Transaksi Nasabah</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<!-- <div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">Jumlah Nasabah</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">Jumlah Sampah</h6>
										</div> -->
										<?php

										if ($notarik) {

										?>

											<div class="table-responsive">
												<table id="add-row" class="display table table-striped table-hover">
													<thead style="background-color: #1572e8; color:white">
														<tr>
															<th>Nama Kelas</th>
															<th>Jumlah Penarikan</th>
														</tr>
													</thead>

													<tbody>
														<?php

														$no = 1;
														while ($user_data2 = mysqli_fetch_array($today2)) {

														?>
															<tr>
																<td><?php echo $user_data2['nama_kelas']; ?></td>
																<td><?php echo $user_data2['jumlah_tarik']; ?></td>


															</tr>
														<?php
														}
														?>
													</tbody>
												</table>

											</div>


										<?php
										} else {

										?>

											<div class="alert alert-danger" style="width:50%; text-align:center" role="alert">
												Tidak Ada Penarikan
											</div>

										<?php

										}

										?>
									</div>
								</div>
							</div>

						</div>



					</div>

				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">

					<div class="copyright ml-auto">
						2021. made with <i class="fa fa-heart heart text-danger"></i> by KKNUnandSaokLaweh
					</div>
				</div>
			</footer>
		</div>



	</div>



	<!-- </div> -->

	<!-- Custom template | don't include it in your project! -->

	<!-- End Custom template -->
	<!-- </div> -->
	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<!-- <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> -->

	<!-- jQuery Vector Maps -->
	<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="assets/js/setting-demo.js"></script>
	<script src="assets/js/demo.js"></script>
	<script>
		Circles.create({
			id: 'circles-1',
			radius: 45,
			value: 60,
			maxValue: 100,
			width: 7,
			text: [<?php while ($a = mysqli_fetch_array($nasabah)) {
								echo $a['count'];
							} ?>],
			colors: ['#f1f1f1', '#FF9E27'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})

		Circles.create({
			id: 'circles-2',
			radius: 45,
			value: 70,
			maxValue: 100,
			width: 7,
			text: [<?php while ($b = mysqli_fetch_array($sampah)) {
								echo $b['count'];
							} ?>],
			colors: ['#f1f1f1', '#2BB930'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})

		Circles.create({
			id: 'circles-3',
			radius: 45,
			value: 40,
			maxValue: 100,
			width: 7,
			text: 12,
			colors: ['#f1f1f1', '#F25961'],
			duration: 400,
			wrpClass: 'circles-wrp',
			textClass: 'circles-text',
			styleWrapper: true,
			styleText: true
		})


		var ctx = document.getElementById("totalIncomeChart").getContext("2d");
		var databar = {
			labels: [<?php while ($p = mysqli_fetch_array($nama_kelas)) {
									echo '"' . $p['nama_kelas'] . '",';
								} ?>],
			datasets: [{
				label: "Saldo",
				data: [<?php while ($p = mysqli_fetch_array($saldo)) {
									echo '"' . $p['saldo'] . '",';
								} ?>],
				backgroundColor: '#ff9e27',
				borderColor: 'rgb(23, 125, 255)',
			}]

		};

		var mytotalIncomeChart = new Chart(ctx, {
			type: 'bar',
			data: databar,
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false
				},
				barValueSpacing: 20,
				scales: {
					yAxes: [{
						ticks: {
							min: 0,
						},
						gridLines: {
							drawBorder: false,
							display: false
						}
					}],

					xAxes: [{
						gridLines: {
							drawBorder: false,
							color: "rgba(0, 0, 0, 0)",
							display: false
						}
					}]
				}
			}
		});


		$('#lineChart').sparkline([105, 103, 123, 100, 95, 105, 115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
</body>

</html>