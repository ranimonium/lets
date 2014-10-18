<?php
session_start();
$con = mysql_connect('localhost', 'root', '');
mysql_select_db('lets', $con);
$idto = $_SESSION['userid'];
if(isset($_GET['xchange'])) {
	$favorid = $_POST['favorid'];
	$status = "Pending";
	$insert_statement = "insert into exchange (`to`, `favor`, `status`) values ($idto, $favorid, '$status')";
	$print = $insert_statement;
	mysql_query($insert_statement);
	//header("location:filter.php");
}

if(isset($_GET['filter'])) {
	$key = $_GET['filter'];
	$data = mysql_query("select * from favor join user on favor.owner = user.userid where type = '$key' and favor.owner != '$idto'");
}
else {
	$data = mysql_query("select * from favor join user on favor.owner = user.userid where favor.owner != '$idto'");
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
		padding: 0
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
	.favor {
		font-family: "Helvetica";
		color: black;
		font-size: 18px;
		font-weight: normal;
	}
	.hidden {
		display: none;
	}
</style>
<body>
	<div class = "reg" id = "logo"><a href = "index.php">Insert App Name Here</a></div>
	<div>Filter Results: <a href = "filter.php">All</a> <a href = "filter.php?filter=Good">Good</a> <a href = "filter.php?filter=Service">Service</a> <a href = "filter.php?filter=Event">Event</a></div>
	<div class = "c main long" >
		<h4>Favors</h4>
		<?php
		while( $favor = mysql_fetch_array($data)){
		?>
			<form method = "post" action = "filter.php?xchange=go" id = "form">
			<input name = "favorid" value ="<?php echo $favor['favorid']?>" class = "favor hidden"/>
			Name: <?php echo $favor['name']?> <input  name = "name" value = "<?php echo $favor['name']?>" class = "favor hidden"/> <br/>
			Posted by: <?php echo $favor['username']?> <input  name = "userid" value = "<?php echo $favor['userid']?>" class = "favor hidden"/> <br/>
			Qty. Available: <?php echo $favor['qty']?> <input name = "qty" value = "<?php echo $favor['qty']?>" class = "favor hidden"/> <br/>
			Description: <?php echo $favor['description']?> <input name = "description" value = "<?php echo $favor['description']?>" class = "favor hidden"/><br/>
			<input type = "submit" value = "BUY" id = "submit"/>
			</form>
			<br/>
			
		<?php
		}
		?>
		
		<?php echo $print ?>
	</div>
</div>
</body>
</html>