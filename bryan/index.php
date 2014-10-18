<?php
session_start();

if (isset($_SESSION['userid'])) {
	header("location:home.php");
}

if(isset($_GET['logout'])) {
	session_destroy();
}

if(isset($_GET['login'])) {
	$login_name = $_POST['username'];
	$login_password = $_POST['password'];
	$con = mysql_connect('localhost', 'root', '');
	mysql_select_db('lets', $con);
	$data = mysql_query("select * from user");
	$existing = "no";
	while( $user = mysql_fetch_array($data)){
		if($user['username'] == $login_name) {
			if($user['password'] == $login_password) {
				if ($user['isOrg']) {
					
					header("location:index.php?error=orglogin");
				}
				else {
					$_SESSION['userid'] = $user['userid'];
					$_SESSION['username'] = $user['username'];
					$_SESSION['points'] = $user['points'];
					$_SESSION['about'] = $user['about'];
					$_SESSION['isOrg'] = $user['isOrg'];
					header("location:home.php");
				}
			}
			else {
				header("location:index.php?error=match");
			}
			
			$existing = "yes";
		}
	}
	if($existing == "no") header("location:index.php?error=notexist");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert App Name Here :D</title>
</head>

<style type="text/css">
	.reg {
		margin: 0;
		padding: 0;
	}
	.c {
		position: relative;
		margin: 0 auto;
	}
	.main {
		width: 800px;
		color: #336699;
		font-weight: bold;
		padding: 10px;
		font-size: 28px;
	}
	#login {
		background: rgba(256,256,256,0.9);
		top: 125px;
		height: 215px;
		width: 400px;
		border-radius: 50px;
		text-align: center;
	}
	#logo a:link, #logo a:visited, #logo a:active, #logo a:hover {
		display: inline-block;
		padding: 10px;
		margin: 0px;
		text-decoration: none;
		color: white;
	}
	#logo {
		color: white;
		font-size: 72px;
		font-weight: bold;
		height: auto;
		width: 800px;
		text-align: center;
		top: 75px;
	}
	#form {
		font-weight: normal;
		font-size: 14px;
		color: #333333;
	}
	.input {
		display: block;
		border: none;
		width: 250px;
		height: 16px;
		background: rgba(241,241,241,0.8);
		padding: 5px;
		margin: 10px;
		color: #232323;
		overflow: hidden;
	}
	.input.c {
		margin: 10px auto;
		text-align: center;
	}
	#submit {
		display: block;
		border: none;
		background: #336699;
		width: 75px;
		height: 30px;
		padding: 0px;
		color: white;
		font-weight: bold;
		font-size: 18px;
		cursor: pointer;
	}
	body {
		background: #99CCFF;
		font-family: Helvetica;
	}
	#register {
		font-size: 12px;
		font-weight: normal;
	}
	#register a:link, #register a:visited {
		text-decoration: none;
		color: #336699;
	}
	#register a:hover, #register a:active {
		text-decoration: underline;
	}
	.red {
		color: red;
		font-size: 12px;
		font-weight: normal;
		display: none;
	}
</style>
<body>
	<div class = "reg c" id = "logo"><a href = "index.php">Insert App Name Here</a></div>
	<div class = "reg c main" id = "login">
	Log In
	<form method = "post" class = "rtn c" id = "form" action = "index.php?login=go">
	Username or Email:
	<input class = "c input" name = "username" type = "text" placeholder = "Username"/>
	Password:
	<input class = "c input" name = "password" type = "password" placeholder = "Password"/>
	<input value = "Submit" type = "submit" class = "c" id = "submit"/>
	</form>
	<div class = "c" id = "register"><a href = "register.php">Register</a></div>
	<?php
		$error_show = "display: none";

		if(isset($_GET['error'])) {
			if($_GET['error'] == "match") {
				$error_message = "Username and password does not match";
				$error_show = "display: block";
			}
			if($_GET['error'] == "notexist") {
				$error_message = "User does not exist";
				$error_show = "display: block";
			}
			if($_GET['error'] == "orglogin") {
				$error_message = "Can't login as an organization";
				$error_show = "display: block";				
			}
		}

	?>
	<div class = "c red" style = "<?php echo $error_show ?>"><?php echo $error_message?></div>
</div>
</body>
</html>