<?php 


include('template/header.php');


if(!isset($_SESSION)){
	session_start();
};

if(isset($_SESSION['login'])){
	header('Location: index.php');
};

if(isset($_SESSION['login-nasabah'])){
	header('Location: index.php');
};


if(isset($_POST['login-nasabah'])){

  // $kode=$_POST['kode'];
  $Username = $_POST['username'];
  $Password = $_POST['password'];

  $result = mysqli_query($conn,"SELECT * FROM nasabah where username='$Username' and password='$Password'");

  $num = mysqli_num_rows($result);

  if($num > 0){
      $row = mysqli_fetch_assoc($result);
			session_start();

      if($row['password'] == $Password){
				$jenis2 = 'nasabah';
        $_SESSION['login-nasabah'] = true;
				$_SESSION['username'] = $Username;
				$_SESSION['jenis'] = $jenis2;
				$_SESSION['id'] = $row['kode'];
        header('Location: index.php');
      }

  }else
  {
    echo "<script type='text/javascript'>alert('Username atau Password Salah');</script>";
  }

}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
	<script src="ui/js/es6-promise.auto.min.js"></script> <!-- IE support -->
	<script src="ui/js/sweetalert2.js"></script>
	<link rel="stylesheet" href="ui/css/sweetalert2.min.css">
	
	<!-- jQuery 2.2.0 -->
	<script src="ui/js/jQuery-2.2.0.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="ui/js/bootstrap.min.js"></script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<title>Login</title>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css?family=Poppins');

		/* BASIC */

		html {
		  background-color: #56baed;
		}

		body {
		  font-family: "Poppins", sans-serif;
		  height: 100vh;
		}

		a {
		  color: #92badd;
		  display:inline-block;
		  text-decoration: none;
		  font-weight: 400;
		}

		h2 {
		  text-align: center;
		  font-size: 16px;
		  font-weight: 600;
		  text-transform: uppercase;
		  display:inline-block;
		  margin: 40px 8px 10px 8px; 
		  color: #cccccc;
		}



		/* STRUCTURE */

		.wrapper {
		  display: flex;
		  align-items: center;
		  flex-direction: column; 
		  justify-content: center;
		  width: 100%;
		  min-height: 100%;
		  padding: 20px;
		}

		#formContent {
		  -webkit-border-radius: 10px 10px 10px 10px;
		  border-radius: 10px 10px 10px 10px;
		  background: #fff;
		  padding: 30px;
		  width: 90%;
		  max-width: 450px;
		  position: relative;
		  padding: 0px;
		  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
		  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
		  text-align: center;
		}

		#formFooter {
		  background-color: #f6f6f6;
		  border-top: 1px solid #dce8f1;
		  padding: 25px;
		  text-align: center;
		  -webkit-border-radius: 0 0 10px 10px;
		  border-radius: 0 0 10px 10px;
		}



		/* TABS */

		h2.inactive {
		  color: #cccccc;
		}

		h2.active {
		  color: #0d0d0d;
		  border-bottom: 2px solid #5fbae9;
		}



		/* FORM TYPOGRAPHY*/

		input[type=button], input[type=submit], input[type=reset]  {
		  background-color: #56baed;
		  border: none;
		  color: white;
		  padding: 15px 80px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  text-transform: uppercase;
		  font-size: 13px;
		  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
		  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
		  -webkit-border-radius: 5px 5px 5px 5px;
		  border-radius: 5px 5px 5px 5px;
		  margin: 5px 20px 40px 20px;
		  -webkit-transition: all 0.3s ease-in-out;
		  -moz-transition: all 0.3s ease-in-out;
		  -ms-transition: all 0.3s ease-in-out;
		  -o-transition: all 0.3s ease-in-out;
		  transition: all 0.3s ease-in-out;
		}

		input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
		  background-color: #39ace7;
		}

		input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
		  -moz-transform: scale(0.95);
		  -webkit-transform: scale(0.95);
		  -o-transform: scale(0.95);
		  -ms-transform: scale(0.95);
		  transform: scale(0.95);
		}

		input[type=text] {
		  background-color: #f6f6f6;
		  border: none;
		  color: #0d0d0d;
		  padding: 15px 32px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
		  margin: 5px;
		  width: 85%;
		  border: 2px solid #f6f6f6;
		  -webkit-transition: all 0.5s ease-in-out;
		  -moz-transition: all 0.5s ease-in-out;
		  -ms-transition: all 0.5s ease-in-out;
		  -o-transition: all 0.5s ease-in-out;
		  transition: all 0.5s ease-in-out;
		  -webkit-border-radius: 5px 5px 5px 5px;
		  border-radius: 5px 5px 5px 5px;
		}

		input[type=password] {
		  background-color: #f6f6f6;
		  border: none;
		  color: #0d0d0d;
		  padding: 15px 32px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
		  margin: 5px;
		  width: 85%;
		  border: 2px solid #f6f6f6;
		  -webkit-transition: all 0.5s ease-in-out;
		  -moz-transition: all 0.5s ease-in-out;
		  -ms-transition: all 0.5s ease-in-out;
		  -o-transition: all 0.5s ease-in-out;
		  transition: all 0.5s ease-in-out;
		  -webkit-border-radius: 5px 5px 5px 5px;
		  border-radius: 5px 5px 5px 5px;
		}

		input[type=text]:focus {
		  background-color: #fff;
		  border-bottom: 2px solid #5fbae9;
		}

		input[type=text]:placeholder {
		  color: #cccccc;
		}



		/* ANIMATIONS */

		/* Simple CSS3 Fade-in-down Animation */
		.fadeInDown {
		  -webkit-animation-name: fadeInDown;
		  animation-name: fadeInDown;
		  -webkit-animation-duration: 1s;
		  animation-duration: 1s;
		  -webkit-animation-fill-mode: both;
		  animation-fill-mode: both;
		}

		@-webkit-keyframes fadeInDown {
		  0% {
		    opacity: 0;
		    -webkit-transform: translate3d(0, -100%, 0);
		    transform: translate3d(0, -100%, 0);
		  }
		  100% {
		    opacity: 1;
		    -webkit-transform: none;
		    transform: none;
		  }
		}

		@keyframes fadeInDown {
		  0% {
		    opacity: 0;
		    -webkit-transform: translate3d(0, -100%, 0);
		    transform: translate3d(0, -100%, 0);
		  }
		  100% {
		    opacity: 1;
		    -webkit-transform: none;
		    transform: none;
		  }
		}

		/* Simple CSS3 Fade-in Animation */
		@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
		@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
		@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

		.fadeIn {
		  opacity:0;
		  -webkit-animation:fadeIn ease-in 1;
		  -moz-animation:fadeIn ease-in 1;
		  animation:fadeIn ease-in 1;

		  -webkit-animation-fill-mode:forwards;
		  -moz-animation-fill-mode:forwards;
		  animation-fill-mode:forwards;

		  -webkit-animation-duration:1s;
		  -moz-animation-duration:1s;
		  animation-duration:1s;
		}

		.fadeIn.first {
		  -webkit-animation-delay: 0.4s;
		  -moz-animation-delay: 0.4s;
		  animation-delay: 0.4s;
		}

		.fadeIn.second {
		  -webkit-animation-delay: 0.6s;
		  -moz-animation-delay: 0.6s;
		  animation-delay: 0.6s;
		}

		.fadeIn.third {
		  -webkit-animation-delay: 0.8s;
		  -moz-animation-delay: 0.8s;
		  animation-delay: 0.8s;
		}

		.fadeIn.fourth {
		  -webkit-animation-delay: 1s;
		  -moz-animation-delay: 1s;
		  animation-delay: 1s;
		}

		/* Simple CSS3 Fade-in Animation */
		.underlineHover:after {
		  display: block;
		  left: 0;
		  bottom: -10px;
		  width: 0;
		  height: 2px;
		  background-color: #56baed;
		  content: "";
		  transition: width 0.2s;
		}

		.underlineHover:hover {
		  color: #0d0d0d;
		}

		.underlineHover:hover:after{
		  width: 100%;
		}

		/* h1 {
    color:#1E90FF;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-weight: 300;
    font-size: 500%;
    text-transform: uppercase;
    margin-bottom: 0;
    text-align: center;

} */


		/* OTHERS */

		*:focus {
		    outline: none;
		} 

		#icon {
		  width:60%;
		}

		* {
		  box-sizing: border-box;
		}
	</style>
</head>
<body>
<div class="wrapper fadeInDown">
<!-- 
<h1>Bank Sampah SMPN 5 Kubung</h1> -->
<!-- <marquee bgcolor="#1E90FF" style="font-family: impact; font-size:24px; color:white; margin-bottom:1rem;" >Halaman Login Bank Sampah SMPN 5 Kubung</marquee> -->
  <div id="formContent">
    <!-- Tabs Titles -->
		<h2 class="active underlineHover">LOGIN NASABAH</h2>
		<h6 class="">Bank Sampah SMPN5 Kubung</h6>

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="assets/img/po.png" style="width: 25%; margin-bottom:5px;" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form class="form-signin" method="post" target="_self">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Username">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
      <input type="submit" class="fadeIn fourth" name="login-nasabah" value="LOGIN" >

      <div class="registration" style="text-align: center; margin-bottom: 2rem;">
                    Bukan Nasabah? Login Sebagai Admin<br/>
                    <a class="" href="login.php" style=>
                        Admin Login
                    </a>
        </div>
    </form>
  </div>
</div>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>