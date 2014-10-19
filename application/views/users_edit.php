<div id="main-content">
	<div class="segment">
		<div class="greeting">Edit Account</div>	
		<form id="form" action="<?php site_url('users/update')?>" method="post">
			<span class="beside">Name</span><input name="username" class="input" type="text" disabled value="<?php echo $details->username?>"><br>
			<span class="beside">Password</span><input name="password" class="input" type="password"><br>
			<span class="beside">About</span><textarea name="about"><?php echo $details->about?></textarea><br>
			<input id="submit" type="submit" value="Submit">
		</form>
	</div>
</div>