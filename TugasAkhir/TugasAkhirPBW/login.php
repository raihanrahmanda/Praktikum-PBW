<?php
	session_start();
	require "asset/php/login-action.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="asset/image/logo-title-final.svg" type="image/icon type">
	<link rel="stylesheet" href="asset/css/login-style.css">
	<link rel="stylesheet" href="asset/css/header-not-login-style.css">
	<link rel="stylesheet" href="asset/css/footer-style.css">
	<link rel="stylesheet" href="asset/css/scroller-style.css">
	<script src="https://kit.fontawesome.com/12f4ff8fbb.js" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/scrollreveal"></script>
	<title>CatchAW Login Page</title>
</head>

<body>
	<?php
		include 'asset/php/header-not-login.php';
	?>

	<div class="container">
		<div class="box1">
			<h1>Go Find Your Partner<br>and Ready to Compete!</h1> 
			<?php if($err){ ?>
				<div id="login-alert" class="alert">
					<ul><?php echo $err ?></ul>
				</div>
			<?php } ?>
			<form action="" method="post">
				<div class="field">
					<input type="text" name="username" value="<?php echo $username ?>">
					<label>Username</label>
				</div>
				<div class="field">
					<input type="password" name="password" id="myInput">
					<span class="eye" onclick="showHidePW()">
						<i id="hide1" class="far fa-eye" style="color: #aaa;"></i>
						<i id="hide2" class="far fa-eye-slash" style="color: #aaa;"></i>
					</span>
					<label>Password</label>
				</div>
				<div class="content">
					<div class="checklist">
						<input type="checkbox" id="rememberme" name="rememberme" value="1" <?php if($rememberme == '1') echo "checked"?>>
						<label>Remember me</label>
					</div>
					<div class="forget-pass-link">
						<a href="forget-pw.php">Forgot password?</a>
					</div>
				</div>

				<div class="field">
					<input type="submit" name="login" value="Login">
				</div>

				<div class="signup-link">
					Ready to CatchAW? <a href="register.php" style="color: #3a7bd5;">Register now!</a>
				</div>
			</form>
		</div>
		<div class="box2">
			<img src="asset/image/picture1.svg" alt="picture1">
		</div>
	</div>
	<div class="about-us-1">
		<div class="image-box">
			<img src="asset/image/picture2.svg" alt="picture2">
		</div>
		<div class="text-box">
			<h1>Find Your Champion Partner Easily</h1>
			<p>CatchAW helps you to find <span style="color: #3a7bd5;">partner</span> who match your requirenment and
				your
				working style,
				so that you can collaborate to reach your goals.</p>
		</div>
	</div>
	<div class="about-us-2">
		<div class="text-box">
			<h1>Choose Your Challenging Competition</h1>
			<p>CatchAW also provides the list of several <span style="color: #3a7bd5;">competitions</span> at national
				and
				international levels. </p>
		</div>
		<div class="image-box">
			<img src="asset/image/picture3.svg" alt="picture3">
		</div>
	</div>

	<div class="about-us-3">
		<div class="image-box">
			<img src="asset/image/picture4.svg" alt="picture4">
		</div>
		<div class="text-box">
			<h1>Improve Your Productivity Through CatchAW Features</h1>
			<p>CatchAW has <span style="color: #3a7bd5;">commitment</span> to become a plaform that support students to
				compete by providing several features, such as competition information, bootcamp & webinar information,
				etc.</p>
		</div>
	</div>
	<?php
		include 'asset/php/footer.php';
	?>
	<script src="asset/js/login.js"></script>
</body>

</html>