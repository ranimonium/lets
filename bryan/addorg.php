<?php
session_start();

if(isset($_POST['username']) && !isset($_GET['error'])) {
	$state = "none";
	$inputusername = $_POST['username'];
	$inputabout = $_POST['about'];
	$con = mysql_connect('localhost', 'root', '');
	mysql_select_db('lets', $con);
	$data = mysql_query("select username from user");
	$error = 0;
	while($user = mysql_fetch_array($data)){
		if( $inputusername == $user['username']) {
			header("location:addorg.php?errortype=found");
			$error = 1;
		}
		if( $inputusername == "" || $inputabout == "") {
			header("location:addorg.php?errortype=fillin");
			$error = 1;
		}
	}
	if (!$error) {
		$insert_statement = "insert into user (username, points, password, about, isOrg) values ('$inputusername', '0', 'password', '$inputabout', '1')";
		mysql_query($insert_statement);
		header("location:index.php");
	}
	mysql_close($con);
}
else {
	if (isset($_GET['errortype']) && $_GET['errortype'] == "found") {
		$state = "block";
		$message = "Try a different username";
	}
	if (isset($_GET['errortype']) && $_GET['errortype'] == "fillin") {
		$state = "block";
		$message = "Fill in missing information";
	}
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
		color: #232323;
		overflow: hidden;
		margin: 10px 10px 10px 0;
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
	textarea {
		display: block;
		border: none;
		width: 250px;
		height: 250px;
		background: rgba(241,241,241,0.8);
		padding: 5px;
		color: #232323;
		overflow: hidden;
		margin: 10px 10px 10px 0;
		font-family: "Helvetica";
	}
</style>
<body>
	<div class = "reg" id = "logo"><a href = "index.php">Insert App Name Here</a></div>
	<div class = "c main long" >
		<h4>Add an Organization</h4>
		<div class = "c red" style = "display: <?php echo $state?>"><?php echo $message?></div>
		<form id = "form" method = "post" action = "addorg.php">
			<span class = "beside">Name</span><input type = "text" class = "input"  name="username"/><br>
			<span class = "beside">About</span><textarea name="about"/></textarea><br>
			<input type="submit" value = "Submit" id = "submit"/>
		</form>
	</div>
</div>
</body>
</html>