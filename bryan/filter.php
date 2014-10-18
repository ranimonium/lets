<?php
session_start();
$con = mysql_connect('localhost', 'root', '');
mysql_select_db('lets', $con);
if(isset($_GET['filter'])  && $_GET['filter']!= "all") {
	$key = $_GET['filter'];
	$data = mysql_query("select * from favor join user on favor.owner = user.userid where type = '$key'");
}
else if ((isset($_GET['filter']) && $_GET['filter']=="all") || !isset($_GET['filter'])) {
	$data = mysql_query("select * from favor join user on favor.owner = user.userid");
}
mysql_close($con);
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
	.favor {
		font-family: "Helvetica";
		color: black;
		font-size: 18px;
		font-weight: normal;
	}
</style>
<body>
	<div class = "reg" id = "logo"><a href = "index.php">Insert App Name Here</a></div>
	<div>Filter Results: <a href = "filter.php?filter=all">All</a> <a href = "filter.php?filter=Good">Good</a> <a href = "filter.php?filter=Service">Service</a> <a href = "filter.php?filter=Event">Event</a></div>
	<div class = "c main long" >
		<h4>Favors</h4>
		<?php
		while( $favor = mysql_fetch_array($data)){
		?>
			<div id = "<?php echo $favor['favorid']?>" class = "favor">
			<div>Favor: <?php echo $favor['name']?></div>
			<div>Posted by: <?php echo $favor['username']?></div>
			<div>Qty. Available: <?php echo $favor['qty']?></div>
			<div>Description: <?php echo $favor['description']?></div>
			</div>
			<br/>
		<?php
		}
		?>
	</div>
</div>
</body>
</html>