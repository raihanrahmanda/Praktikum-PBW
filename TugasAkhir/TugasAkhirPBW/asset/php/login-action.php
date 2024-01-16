<?php
	require "db-config.php";
    $err    	= "";
	$username   = "";
	$rememberme   = "";

	if(isset($_COOKIE['cookie_username'])){
		$cookie_username = $_COOKIE['cookie_username'];
		$cookie_password = $_COOKIE['cookie_password'];
	
		$sql1 = "select * from users where username = '$cookie_username'";
		$q1   = mysqli_query($conn,$sql1);
		$r1   = mysqli_fetch_array($q1);
		if($r1['password'] == $cookie_password){
			$_SESSION['session_username'] = $cookie_username;
			$_SESSION['session_password'] = $cookie_password;
		}
	}
	
	if(isset($_SESSION['session_username'])){
		header("location:beranda-user.php");
		exit();
	}

	if(isset($_POST['login'])){
		$username   = $_POST['username'];
		$password   = $_POST['password'];
		if (isset($_POST['rememberme'])) {
			$rememberme = $_POST['rememberme'];
		}

	
		if($username == '' or $password == ''){
			$err .= "<li>Please enter username and password.</li>";
		}else{
			$sql1 = "select * from users where username = '$username'";
			$q1   = mysqli_query($conn,$sql1);
			$r1   = mysqli_fetch_array($q1);

			if (!$r1) {
				$err .= "<li>Username <b>$username</b> not found.</li>";
			} elseif ($r1 && $r1['password'] != $password) {
				$err .= "<li>Password doesn't match.</li>";
			}
			
			if(empty($err)){
				$_SESSION['session_username'] = $username;
				$_SESSION['session_password'] = $password;
	
				if($rememberme == 1){
					$cookie_name = "cookie_username";
					$cookie_value = $username;
					$cookie_time = time() + (60 * 60 * 24);
					setcookie($cookie_name,$cookie_value,$cookie_time,"/");
	
					$cookie_name = "cookie_password";
					$cookie_value = $password;
					$cookie_time = time() + (60 * 60 * 24);
					setcookie($cookie_name,$cookie_value,$cookie_time,"/");
				}

				if ($r1['role'] == 'admin'){
					header("location:admin-dashboard.php");
				} else {
					header("location:beranda-user.php");
				}
			}
		}
	}
?>