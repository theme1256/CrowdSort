<?php
    include "/var/www/crowdsort/include/head.php";
?>
<div class="productive.ly">
	<div id="cbp-so-scroller" class="cbp-so-scroller">
		<div class="content_top">
			<div class="col-md-6 col-md-offset-3" id="about">
				<h3>Login</h3>
				<?php if(!empty($_SESSION['errors'])){?>
				<p>Error: <?php echo $_SESSION['errors']; $_SESSION['errors'] = "";?></p>
				<?php }?>
				<form action="<?php echo SCRIPTS;?>login.php" method="post" enctype="multipart/form-data">
					Username: <input type="text" name="username" placeholder="Your alias or email"/><br/>
					Password: <input type="password" name="password" placeholder="Your password, duh"/><br/>
					<input type="submit" value="Login"/>
					<a href="/register"> Or click here to register</a>
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<?php
    include ROD."include/foot.php";
?>