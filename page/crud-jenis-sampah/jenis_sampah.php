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
	$result = mysqli_query($conn, "SELECT * FROM  jenis_sampah");
	?>

	<div class="wrapper">
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Jenis Sampah</h4>
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
										<h4 class="card-title" style="flex: 1;">Daftar Jenis Sampah</h4>
										<div>
											<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" style="margin:unset">

												<a href="tambah-jenis_sampah.php" class="button is-primary" style="color:white !important; text-decoration:none;" class="fa fa-plus">

													Tambah Jenis Sampah
												</a>
											</button>

										</div>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->


									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover">
											<thead>
												<tr>
													<th>No</th>
													<th>Kode</th>
													<th>Nama Jenis Sampah</th>
													<th style="width: 15%">Action</th>
												</tr>
											</thead>

											<tbody>
												<?php

												$no = 1;
												while ($user_data = mysqli_fetch_array($result)) {
												?>
													<tr>
														<td><?php echo $no++; ?></td>
														<td><?php echo $user_data['kode_jenis']; ?></td>
														<td><?php echo $user_data['nama_jenis']; ?></td>

														<td>

															<a href="edit-jenis_sampah.php?kode_jenis=<?php echo $user_data['kode_jenis']; ?>" class="btn btn-primary btn-sm mr-1"><i class="fa fa-edit"></i></a>
															<a href="del-jenis_sampah.php?kode_jenis=<?php echo $user_data['kode_jenis']; ?>" class="btn btn-danger btn-sm mr-1"><i class="fa fa-trash"></i></a>



														</td>
													</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>



		</div>

		</script>

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
			});
		</script>

</body>