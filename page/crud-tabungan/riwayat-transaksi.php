<?php

session_start();

if (!isset($_SESSION['jenis'])) {
	header('Location: ../../login-nasabah.php');
};

include('../../template/header.php');
include('../../template/sidebar.php');


?>

<body>

	<?php
	// Fetch all users data from database
	// $result = mysqli_query($conn, "SELECT * FROM  sampah");
	// $id = isset($_GET['kode_sampah']) ? $_GET['kode_sampah'] : 01;

	$kode_tabungan = $_GET['kode_tabungan'];



	$result2 = mysqli_query($conn, "SELECT *  FROM  tarik  JOIN nasabah ON tarik.kode=nasabah.kode JOIN tabungan ON tarik.kode_tabungan=tabungan.kode_tabungan where tarik.kode_tabungan=" . $kode_tabungan);

	$result3 = mysqli_query($conn, "SELECT * FROM  setor  JOIN nasabah ON setor.kode=nasabah.kode JOIN tabungan ON setor.kode_tabungan=tabungan.kode_tabungan where setor.kode_tabungan=" . $kode_tabungan);

	// $saldo =$user_data['saldo'];

	//  var_dump(json_encode(mysqli_fetch_array($result3)));
	//  die();
	// $user_data = mysqli_fetch_array($result2);
	// $user_data2 = mysqli_fetch_array($result3);


	?>

	<div class="wrapper">
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Buku tabungan</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Tables</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>

						</ul>
					</div>
					<div class="row">

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">

										<?php


										$result4 = mysqli_query($conn, "SELECT * from tabungan  JOIN nasabah ON tabungan.kode=nasabah.kode where tabungan.kode_tabungan=" . $kode_tabungan);
										$user_data3 = mysqli_fetch_array($result4);

										?>
										<h4 class="card-title" style="flex: 1;">Riwayat Transaksi <?php echo $user_data3['nama_kelas']; ?></h4>
										<div>
											<!-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" style="margin:unset">

												<a href="tambah-setor.php" class="button is-primary" style="color:white !important; text-decoration:none;" class="fa fa-plus">

													Tambah Setoran
												</a>
											</button> -->


										</div>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
<div style="display: flex;">


									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover">
											<thead>
												<tr>
													<th>No</th>
													<th>Tanggal Setor</th>
													<th>Jumlah Setoran</th>


												</tr>
											</thead>
											<h6 class="card-title" style="flex: 1; font-size:1rem;text-align:center;font-weight:bold; padding:1rem ;">Riwayat Setor</h6>
											<tbody>
												<?php

												$no = 1;

												while ($user_data2 = mysqli_fetch_array($result3)) {

												?>
													<tr>
														<td><?php echo  	$no++; ?></td>
														<td><?php echo $user_data2['tgl_setor']; ?></td>
														<td><?php echo $user_data2['harga'] *  $user_data2['quantity']; ?></td>


													</tr>
												<?php
												}
												?>

											</tbody>
										</table>

									</div>
									<div class="table-responsive">
										<table id="add-row-2" class="display table table-striped table-hover">
											<thead>

											
												<tr>
													<th>No</th>
													<th>Tanggal Tarik</th>
													<th>Jumlah Penarikan</th>


												</tr>
											</thead>
											<h6 class="card-title" style="flex: 1; font-size:1rem;text-align:center;font-weight:bold; padding:1rem ">Riwayat Tarik</h6>
											<tbody>
												<?php

												$no1 = 1;

												while ($user_data = mysqli_fetch_array($result2)) {

												?>
													<tr>
														<td><?php echo  	$no1++; ?></td>
														<td><?php echo $user_data['tgl_tarik']; ?></td>
														<td><?php echo $user_data['jumlah_tarik']; ?></td>


													</tr>
												<?php
												}
												?>

											</tbody>
										</table>

										<table>

									</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>



				<!--   Core JS Files   -->
				<script src="../../assets/js/core/jquery.3.2.1.min.js"></script>
				<script src="../../assets/js/core/popper.min.js"></script>
				<script src="../../assets/js/core/bootstrap.min.js"></script>
				<!-- jQuery UI -->
				<script src="../../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
				<script src="../../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

				<!-- jQuery Scrollbar -->
				<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
				<!-- Datatables -->
				<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>
				<!-- Atlantis JS -->
				<script src="../../assets/js/atlantis.min.js"></script>
				<!-- Atlantis DEMO methods, don't include it in your project! -->
				<script src="../../assets/js/setting-demo2.js"></script>
				<script>
					$(document).ready(function() {
						$('#basic-datatables').DataTable({});

						$('#multi-filter-select').DataTable({
							"pageLength": 5,
							initComplete: function() {
								this.api().columns().every(function() {
									var column = this;
									var select = $('<select class="form-control"><option value=""></option></select>')
										.appendTo($(column.footer()).empty())
										.on('change', function() {
											var val = $.fn.dataTable.util.escapeRegex(
												$(this).val()
											);

											column
												.search(val ? '^' + val + '$' : '', true, false)
												.draw();
										});

									column.data().unique().sort().each(function(d, j) {
										select.append('<option value="' + d + '">' + d + '</option>')
									});
								});
							}
						});

						// Add Row
						$('#add-row').DataTable({
							"pageLength": 5,
						});

						var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

						$('#addRowButton').click(function() {
							$('#add-row').dataTable().fnAddData([
								$("#addName").val(),
								$("#addPosition").val(),
								$("#addOffice").val(),
								action
							]);
							$('#addRowModal').modal('hide');

						});

						// Add Row
						$('#add-row-2').DataTable({
							"pageLength": 5,
						});

						var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

						$('#addRowButton').click(function() {
							$('#add-row-2').dataTable().fnAddData([
								$("#addName").val(),
								$("#addPosition").val(),
								$("#addOffice").val(),
								action
							]);
							$('#addRowModal').modal('hide');

						});


					});

					

					
				</script>

</body>