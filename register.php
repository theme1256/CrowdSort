<?php
    include "/var/www/crowdsort/include/head.php";
?>
<div class="productive.ly">
	<div id="cbp-so-scroller" class="cbp-so-scroller">
		<div class="content_top">
			<div class="col-md-6 col-md-offset-3" id="about">
				<h3>Register</h3>
				<?php if(!empty($_SESSION['errors'])){?>
				<p>Error: <?php echo $_SESSION['errors']; $_SESSION['errors'] = "";?></p>
				<?php }?>
				<form action="<?php echo SCRIPTS;?>register.php" method="post" enctype="multipart/form-data">
					Username: <input type="text" id="alias" name="username" placeholder="The alias that you will be know under" maxlength="30"/><br/>
					Email: <input type="email" id="email" name="email" placeholder="Some email that you use" maxlength="100"/><br/>
					Password: <input type="password" id="pass1" name="password1" placeholder=""/><br/>
					Password: <input type="password" id="pass2" name="password2" placeholder="Just to make sure you got it right"/><br/>
					<script src='https://www.google.com/recaptcha/api.js'></script>
					<div class="g-recaptcha" data-sitekey="6Lf2RwgTAAAAAGNQ0_JUHvHhOun6gCfiwb0TMX-C"></div>
					<input type="submit" value="Register" disabled="disabled"/>
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<?php
    include ROD."include/foot.php";
?>