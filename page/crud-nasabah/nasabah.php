<?php
session_start();

if (!isset($_SESSION['jenis'])) {
	header('Location: ../../login-nasabah.php');
};

include('../../template/header.php');
include('../../template/sidebar.php');


$username = $_SESSION['username'];
$jenis = $_SESSION['jenis'];

$isAdmin = $jenis == 'admin';
$isNasabah = $jenis == 'nasabah';


?>

<body>

	<?php
	// Fetch all users data from database
	$result = mysqli_query($conn, "SELECT * FROM  nasabah");
	?>

	<div class="wrapper">
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Nasabah</h4>
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
										<h4 class="card-title" style="flex: 1;">Daftar Nasabah</h4>
										<div>

											<?php
											if ($isAdmin) {

											?>

												<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" style="margin:unset">

													<a href="tambah-nasabah.php" class="button is-primary" style="color:white !important; text-decoration:none;" class="fa fa-plus">

														Tambah Nasabah
													</a>
												</button>

												<button class="btn btn-primary btn-round ml-auto" data-toggle="modal">

													<a href="print-nasabah.php" class="button is-primary" style="color:white !important; text-decoration:none;" class="fa fa-plus">

														print
													</a>
												</button>

											<?php
											} ?>
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
													<th>Nama Kelas</th>
													<th>Jumlah Siswa</th>
													<th>Angkatan</th>
													<th>Nama Wali Kelas</th>

													<?php
													if ($isAdmin) {

													?>
													
													<th>Username</th>
													<th>Password</th>

												
														<th style="width: 10%">Action</th>

													<?php
													}

													?>
												</tr>
											</thead>

											<tbody>
												<?php

												$no = 1;
												while ($user_data = mysqli_fetch_array($result)) {
												?>
													<tr>
														<td><?php echo $no++; ?></td>
														<td><?php echo $user_data['kode']; ?></td>
														<td><?php echo $user_data['nama_kelas']; ?></td>
														<td><?php echo $user_data['jumlah_siswa']; ?></td>
														<td><?php echo $user_data['angkatan']; ?></td>
														<td><?php echo $user_data['nama_wali_kelas']; ?></td>

														<?php
											if ($isAdmin) {
							
											?>
														<td><?php echo $user_data['username']; ?></td>
														<td><?php echo $user_data['password']; ?></td>

											
														<td>


															<?php
															$obj = json_encode($user_data)

															?>
															<?php
															if ($_SESSION['jenis'] == 'admin') {

															?>
																<div class="form-button-action">
																	<button class="btn btn-success btn-sm mr-1" onclick='onModal(<?php echo $obj; ?>);' data-toggle="modal" data-target="#addRowModal">
																		<i class="fa fa-search"></i>

																	</button>

																	<a href="edit-nasabah.php?kode=<?php echo $user_data['kode']; ?>" class="btn btn-primary btn-sm mr-1"><i class="fa fa-edit"></i></a>
																	<a href="del-nasabah.php?kode=<?php echo $user_data['kode']; ?>" class="btn btn-danger btn-sm mr-1"><i class="fa fa-trash"></i></a>
																<?php }

																?>


														</td>

														<?php 
											}
											?>
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


			<!-- Modal -->

			<?php
			if (isset($_GET['kode'])) {
				$kode = $_GET['kode'];
				$result = mysqli_query($conn, "SELECT * FROM  nasabah WHERE kode=" . $kode);

				$user_data = mysqli_fetch_array($result);
			}
			?>
			<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header no-bd">
							<h5 class="modal-title">
								<span class="fw-mediumbold">
									Data</span>
								<span class="fw-light">
									Nasabah
								</span>
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p class="small">Nasabah Bank Sampah SMPN 5 Kubung</p>
							<form>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group form-group-default">
											<label>Kode Nasabah</label>
											<input id="kode" name="kode" type="text" class="form-control" value="<?php echo $user_data['kode']; ?>" readonly>
										</div>

										<div class="form-group form-group-default">
											<label>Nama Kelas</label>
											<input id="nama_kelas" name="nama_kelas" type="text" class="form-control" required value="<?php echo $user_data['nama_kelas']; ?>" readonly>
										</div>

										<div class="form-group form-group-default">
											<label>Jumlah Siswa</label>
											<input id="jumlah_siswa" name="jumlah_siswa" type="text" class="form-control" required value="<?php echo $user_data['jumlah_siswa']; ?>" readonly>
										</div>

										<div class="form-group form-group-default">
											<label>Angkatan</label>
											<input id="angkatan" name="angkatan" type="text" class="form-control" required value="<?php echo $user_data['angkatan']; ?>" readonly>
										</div>

										<div class="form-group form-group-default">
											<label>Nama Wali Kelas</label>
											<input id="nama_wali_kelas" name="nama_wali_kelas" type="text" class="form-control" required value="<?php echo $user_data['nama_wali_kelas']; ?>" readonly>
										</div>

										<div class="form-group form-group-default">
											<label>Username</label>
											<input id="username" name="username" type="text" class="form-control" required value="<?php echo $user_data['username']; ?>" readonly>
										</div>

										<div class="form-group form-group-default">
											<label>Password</label>
											<input id="password" name="password" type="text" class="form-control" required value="<?php echo $user_data['password']; ?>" readonly>
										</div>

									</div>
							</form>
						</div>
						<div class="modal-footer no-bd">



							<a href="print-detail.php?kode=<?php echo $user_data['kode']; ?>" type="button" id="printDetail" class="btn btn-primary" style="color:white !important; text-decoration:none;">Print</a>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	
<?php 

?>
	<script>
		function onModal(kode) {

			const kodeShow = document.getElementById('kode');
			const nama_kelas = document.getElementById('nama_kelas');
			const jumlah_siswa = document.getElementById('jumlah_siswa');
			const angkatan = document.getElementById('angkatan');
			const nama_wali_kelas = document.getElementById('nama_wali_kelas');
			const username = document.getElementById('username');
			const password = document.getElementById('password');
			const print = document.getElementById('printDetail');

			kodeShow.value = kode.kode
			nama_kelas.value = kode.nama_kelas
			jumlah_siswa.value = kode.jumlah_siswa
			angkatan.value = kode.angkatan
			nama_wali_kelas.value = kode.nama_wali_kelas
			username.value = kode.username
			password.value = kode.password
			print.href = "print-detail.php?kode=" + kode.kode


		}
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

</html>
		