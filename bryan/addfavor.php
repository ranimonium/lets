<?php
session_start();

if(isset($_POST['name'])) {
	$state = "none";
	$inputname = $_POST['name'];
	$inputworth = $_POST['worth'];
	$inputquantity = $_POST['quantity'];
	$inputdescription = $_POST['description'];
	$inputtype = $_POST['type'];
	$con = mysql_connect('localhost', 'root', '');
	mysql_select_db('lets', $con);
	if ($inputname == "" || $inputdescription == "" || $inputworth == "" || $inputquantity == "") {
		header("location:addfavor.php?errortype=fillin");
	}
	$owner = $_SESSION['userid'];
	$insert_statement = "insert into favor (name, owner, worth, qty, type, description) values ('$inputname', '$owner', '$inputworth', '$inputquantity', '$inputtype', '$inputdescription')";
	mysql_query($insert_statement);
	mysql_close($con);
	header("location:index.php");
}
else {
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
	select {
		display: block;
		border: none;
		width: 261px;
		height: 30px;
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
		<h4>Add a Favor</h4> 
		<form id = "form" method = "post" action = "addfavor.php">
			<div class = "c red" style = "display: <?php echo $state?>"><?php echo $message?></div>
			Name<input type = "text" class = "input"  name="name"/><br>
			Type
			<select name="type">
				<option value = "Event">Event</option>
				<option value = "Good">Good</option>
				<option value = "Service">Service</option>
			</select>
			<br>
			Quantity<input type = "text" class = "input"  name="quantity"/><br>
			Worth<input type = "text" class = "input"  name="worth"/><br>
			Description<textarea name="description"/></textarea><br>
			<input type="submit" value = "Submit" id = "submit"/>
		</form>
	</div>
</div>
</body>
</html>