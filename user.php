<?php
    include "/var/www/crowdsort/include/head.php";
    if(isset($_GET['user'])){
?>
<?php }else{?>
<div class="">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="grid">
					<?php if(!empty($_SESSION['errors'])){?>
					<h2>Error</h2>
					<p><?php echo $_SESSION['errors'];?></p>
					<?php }if($_SESSION['success']){ $_SESSION['success'] = "";?>
					<h2>Success</h2>
					<p>
						The information was successfully updated.
						<?php if(!empty($_SESSION['errors'])){echo "But not the passwords.";}?>
					</p>
					<?php }$_SESSION['errors'] = "";?>
				</div>
			</div>
		</div>
		<div class="row top-grids">
			<div class="col-md-5 text-center grid1 col-md-offset-1">
				<div class="grid">
					<script src="/js/dropzone.js"></script>
					<img src="/img/profile/<?php echo $r['pic'];?>" alt="" class="profilePic"/> 
					<h2>Welcome <?php echo $_SESSION['alias'];?></h2>
					<p>
						This is your info.<br/>
						<?php if($r['pic'] == "c21f969b5f03d33d43e04f8f136e7682.png"){?>
						We recommend that you change your picture.<br/>
						<?php }?>
						<form action="/scripts/profilePic.php" method="post" class="dropzone" id="dropzone">
						  	<div class="fallback">
						    	<input name="file" type="file" />
						  	</div>
						</form>
					</p>
				</div>
			</div>
			<div class="col-md-5 grid1">
				<div class="grid">
					<h2>Info</h2>
					<form action="<?php echo SCRIPTS;?>updateUser.php" method="post" enctype="multipart/form-data">
						Username: <input type="text" id="alias" name="username" placeholder="The alias that you will be know under" maxlength="30" value="<?php echo $r['alias'];?>" style="margin-left: 63px;"/><br/>
						Email: <input type="email" id="email" name="email" placeholder="Some email that you use" maxlength="100" value="<?php echo $r['email'];?>" style="margin-left: 100px;"/><br/>
						Old Password: <input type="password" id="pass1" name="password1" placeholder="" style="margin-left: 38px;"/><br/>
						New Password: <input type="password" id="pass2" name="password2" placeholder=""/><br/>
						New Password: <input type="password" id="pass3" name="password3" placeholder="Just to make sure you got it right"/><br/>
						<input type="submit" value="Update"/>
					</form>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<?php
	}
    include ROD."include/foot.php";
?>