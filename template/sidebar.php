<?php

// session_start();	

$username = $_SESSION['username'];
$jenis = $_SESSION['jenis'];

$isAdmin = $jenis == 'admin';
$isNasabah = $jenis == 'nasabah';
?>
<div class="main-header">
	<!-- Logo Header -->
	<div class="logo-header" data-background-color="blue">

		<a href="<?php echo $data . '../index.php'; ?>" class="logo" style="height:unset;">


			<img src=" <?php echo $data . '../assets/img/logos.png'; ?>" style="max-width: 75%; width: 100%; " alt="navbar brand" class="navbar-brand">
		</a>
	</div>
	<!-- End Logo Header -->

	<!-- Navbar Header -->
	<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

		<div class="container-fluid">
			<div class="collapse" id="search-nav">
				<!-- <form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form> -->
			</div>
			<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
				<li class="nav-item toggle-nav-search hidden-caret">
					<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
						<i class="fa fa-search"></i>
					</a>
				</li>
				<!-- <li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope"></i>
							</a> -->
				<!-- <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title d-flex justify-content-between align-items-center">
										Messages 									
										<a href="#" class="small">Mark all as read</a>
									</div>
								</li>
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<div class="notif-img"> 
													<img src="assets/img/jm_denis.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jimmy Denis</span>
													<span class="block">
														How are you ?
													</span>
													<span class="time">5 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="assets/img/chadengle.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Chad</span>
													<span class="block">
														Ok, Thanks !
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="assets/img/mlane.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Jhon Doe</span>
													<span class="block">
														Ready for the meeting today...
													</span>
													<span class="time">12 minutes ago</span> 
												</div>
											</a>
											<a href="#">
												<div class="notif-img"> 
													<img src="assets/img/talha.jpg" alt="Img Profile">
												</div>
												<div class="notif-content">
													<span class="subject">Talha</span>
													<span class="block">
														Hi, Apa Kabar ?
													</span>
													<span class="time">17 minutes ago</span> 
												</div>
											</a>
										</div>
									</div>
								</li> -->
				<!-- <li>
									<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
								</li> -->
				<!-- </ul> -->
				</li>
				<li class="nav-item dropdown hidden-caret">
					<!-- <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">4</span> -->
					<!-- </a> -->
					<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
						<li>
							<div class="dropdown-title">You have 4 new notification</div>
						</li>
						<li>
							<div class="notif-scroll scrollbar-outer">
								<div class="notif-center">
									<a href="#">
										<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
										<div class="notif-content">
											<span class="block">
												New user registered
											</span>
											<span class="time">5 minutes ago</span>
										</div>
									</a>
									<a href="#">
										<div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
										<div class="notif-content">
											<span class="block">
												Rahmad commented on Admin
											</span>
											<span class="time">12 minutes ago</span>
										</div>
									</a>
									<a href="#">
										<div class="notif-img">


											<img src="<?php echo $data . '../assets/img/profile2.jpg'; ?>" alt="Img Profile">
										</div>
										<div class="notif-content">
											<span class="block">
												Reza send messages to you
											</span>
											<span class="time">12 minutes ago</span>
										</div>
									</a>
									<a href="#">
										<div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
										<div class="notif-content">
											<span class="block">
												Farrah liked Admin
											</span>
											<span class="time">17 minutes ago</span>
										</div>
									</a>
								</div>
							</div>
						</li>
						<li>
							<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
						</li>
					</ul>
				</li>
				<!-- <li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
								<div class="quick-actions-header">
									<span class="title mb-1">Quick Actions</span>
									<span class="subtitle op-8">Shortcuts</span>
								</div> -->
				<!-- <div class="quick-actions-scroll scrollbar-outer">
									<div class="quick-actions-items">
										<div class="row m-0">
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Generated Report</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-database"></i>
													<span class="text">Create New Database</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-pen"></i>
													<span class="text">Create New Post</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-interface-1"></i>
													<span class="text">Create New Task</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-list"></i>
													<span class="text">Completed Tasks</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file"></i>
													<span class="text">Create New Invoice</span>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</li> -->
				<li class="nav-item dropdown hidden-caret">
					<!-- <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
						<div>
							<a href="<?php echo $data . '../login-nasabah.php' ?>" class="btn btn-primary btn-block"><span class="btn-label mr-1"> <i class="fas fa-arrow-alt-circle-right"></i> Login</span></a>
						</div>
					</a> -->
					<!-- <ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
              
											<div class="avatar-lg"><img src="<?php echo $data . '../assets/img/po.png'; ?> " alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>Admin</h4>
												<p class="text-muted">hello@admin</p>
											</div>
										</div>
									</li> -->
					<!-- <li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">My Profile</a>
										<a class="dropdown-item" href="#">My Balance</a>
										<a class="dropdown-item" href="#">Inbox</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Account Setting</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Logout</a>
									</li> -->
					<!-- </div>
							</ul>
						</li> -->
			</ul>
		</div>
	</nav>
	<!-- End Navbar -->
</div>

<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">



					<img src="<?php echo $data . '../assets/img/po.png'; ?>" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							<?php echo $username; ?>
							<span class="user-level"><?php echo $jenis; ?></span>
							<!-- <span class="caret"></span> -->
						</span>
					</a>
					<div class="clearfix"></div>

					<!-- <div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div> -->
				</div>
			</div>
			<ul class="nav nav-primary">
				<li class="nav-item active">

					<a href="<?php echo $data . '/index.php'; ?> " class="collapsed">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
						<!-- <span class="caret"></span> -->
					</a>
					<!-- <div class="collapse" id="dashboard">
								<ul class="nav nav-collapse">
									<li>
										<a href="demo1/index.html">
											<span class="sub-item">Dashboard 1</span>
										</a>
									</li>
									<li>
										<a href="demo2/index.html">
											<span class="sub-item">Dashboard 2</span>
										</a>
									</li>
								</ul>
							</div> -->
					<!-- </li> -->
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Page</h4>
				</li>

				<li class="nav-item">



					<a href="<?php echo $data . '/page/crud-nasabah/nasabah.php'; ?>" class="collapsed">
						<i class="fas fa-address-book"></i>
						<p>Nasabah</p>
						<!-- <span class="caret"></span> -->
					</a>
				</li>

				<?php
				if ($isNasabah) {


				?>

					<li class="nav-item">



						<a href="<?php echo $data . '/page/crud-sampah/sampah.php'; ?>" class="collapsed">
							<i class="fas fa-tree"></i>
							<p>Sampah</p>
							<!-- <span class="caret"></span> -->
						</a>
					</li>

				<?php
				} else {

				?>
					<li class="nav-item">
						<a data-toggle="collapse" href="#formsa">
							<i class="fas fa-tree"></i>
							<p>Sampah</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="formsa">

							<ul class="nav nav-collapse">
								<li>
									<a href="<?php echo $data . '/page/crud-jenis-sampah/jenis_sampah.php'; ?>" class="collapsed">
										<span class="sub-item">Kelola Jenis Sampah</span>
									</a>
								</li>

								<li>
									<a href="<?php echo $data . '/page/crud-sampah/sampah.php'; ?>" class="collapsed">
										<span class="sub-item">Kelola Data Sampah</span>
									</a>
								</li>
							</ul>
						</div>
					</li>


				<?php
				}
				?>

				<?php

				if (!$isNasabah) {


				?>

					<li class="nav-item">
						<a data-toggle="collapse" href="#tables">
							<i class="fas fa-pen-square"></i>
							<p>Transaksi</p>
							<span class="caret"></span>
						</a>
						<div class="collapse" id="tables">
							<ul class="nav nav-collapse">
								<li>
									<a href="<?php echo $data . '/page/crud-setor/setor.php'; ?>" class="collapsed">
										<span class="sub-item">Setor</span>
									</a>
								</li>
								<li>
									<a href="<?php echo $data . '/page/crud-tarik/tarik.php'; ?>" class="collapsed">
										<span class="sub-item">Tarik</span>
									</a>
								</li>
							</ul>
						</div>
					</li>

				<?php
				}
				?>

				<li class="nav-item">
					<a href="<?php echo $data . '/page/crud-tabungan/tabungan.php'; ?>" class="collapsed">
						<i class="fas fa-credit-card"></i>
						<p>Tabungan</p>
						<!-- <span class="caret"></span> -->
					</a>
					<!-- <div class="collapse" id="maps">
								<ul class="nav nav-collapse">
									<li>
										<a href="maps/jqvmap.html">
											<span class="sub-item">JQVMap</span>
										</a>
									</li>
								</ul>
							</div>
						</li> -->
					<!-- <li class="nav-item">
							<a data-toggle="collapse" href="#charts">
								<i class="far fa-chart-bar"></i>
								<p>Charts</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="charts">
								<ul class="nav nav-collapse">
									<li>
										<a href="charts/charts.html">
											<span class="sub-item">Chart Js</span>
										</a>
									</li>
									<li>
										<a href="charts/sparkline.html">
											<span class="sub-item">Sparkline</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="widgets.html">
								<i class="fas fa-desktop"></i>
								<p>Widgets</p>
								<span class="badge badge-success">4</span>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#submenu">
								<i class="fas fa-bars"></i>
								<p>Menu Levels</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="submenu">
								<ul class="nav nav-collapse">
									<li>
										<a data-toggle="collapse" href="#subnav1">
											<span class="sub-item">Level 1</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav1">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="#">
														<span class="sub-item">Level 2</span>
													</a>
												</li>
												<li>
													<a href="#">
														<span class="sub-item">Level 2</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li>
										<a data-toggle="collapse" href="#subnav2">
											<span class="sub-item">Level 1</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav2">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="#">
														<span class="sub-item">Level 2</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li>
										<a href="#">
											<span class="sub-item">Level 1</span>
										</a>
									</li>
								</ul>
							</div>
						</li> -->
				</li>

				<?php

				if ($_SESSION['jenis'] == 'admin') {


				?>

					<li class="nav-item">
						<a href="<?php echo $data . '/page/kelola-user/kelola-user.php'; ?>" class="collapsed">
							<i class="fas fa-user-cog"></i>
							<p>Kelola Admin</p>
							<!-- <span class="caret"></span> -->
						</a>


					</li>

				<?php
				}
				?>

				<li class="mx-4 mt-2">
					<a href="<?php echo $data . '/logout.php' ?>" class="btn btn-primary btn-block" style="margin-top:90px;"><span class="btn-label mr-2"> <i class="fas fa-arrow-alt-circle-left"></i> </span>Logout</a> -->
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Sidebar -->