<?php
    include "/var/www/crowdsort/include/head.php";
?>
<div class="">
	<div class="container-fluid">
		<div class="row top-grids">
			<div class="col-md-5 text-center grid1 col-md-offset-1">
				<div class="grid">
					<img src="/img/profile/<?php echo $r['pic'];?>" alt="" class="profilePic"> 
					<h2>Welcome <?php echo $_SESSION['alias'];?></h2>
					<p>
						This is your homescreen.<br/>
						Here you will find a list of all albums you have uploaded, been invited to or contributed to.
					</p>
				</div>
			</div>
			<div class="col-md-5 text-center grid1">
				<div class="grid" style="text-align: left;">
					<h2>Quicklinks</h2>
					<p>
						<a href="/user">Your profile</a><br>
						<a href="/album">Create album</a><br/>
						<a href="/friends">My friends</a><br/>
					</p>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<?php
	//Hvis denne bruger ejer minimum et album vis næste div
	$q = mysqli_query($con, "SELECT * FROM Albums INNER JOIN Users ON Users.userID=Albums.userID WHERE userID=$uID");
	if(mysqli_num_rows($q) > 0){
?>
<div class="productive.ly">
	<div id="cbp-so-scroller" class="cbp-so-scroller">
		<div class="content_top">
			<div class="ipad_desc album-list" id="about">
				<h3>Albums you uploaded</h3>
				<?php while($a = mysqli_fetch_array($q)){ $aID = $a['albumID'];?>
				<div class="albumPreview" onclick="window.location.href='/album/<?php echo $a['albumID'];?>';">
					<img src="/img/profile/<?php echo $r['pic'];?>" alt="">
					<p>
						Album name: <?php echo $a['name'];?><br/>
						Contributors: <?php $n = mysqli_query($con,"SELECT * FROM AlbumContributors WHERE albumID=$aID"); echo mysqli_num_rows($n);?><br/>
						Upload date: <?php echo date("d/m/Y", $a['created']);?><br/>
					</p>
				</div>
				<?php }?>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<?php
	}
	//Hvis denne bruger er inviteret til minimum et album vis næste div
	$q = mysqli_query($con, "SELECT * FROM AlbumInvites INNER JOIN Albums ON AlbumInvites.albumID=Albums.albumID INNER JOIN Users ON Users.userID=Albums.userID WHERE invitesID=$uID");
	if(mysqli_num_rows($q) > 0){
?>
<div class="productive.ly">
	<div id="cbp-so-scroller" class="cbp-so-scroller">
		<div class="content_top">
			<div class="ipad_desc album-list" id="about">
				<h3>Albums you are invited to</h3>
				<?php while($a = mysqli_fetch_array($q)){ $aID = $a['albumID'];?>
				<div class="albumPreview" onclick="window.location.href='/album/<?php echo $a['albumID'];?>';">
					<img src="/img/profile/<?php echo $r['pic'];?>" alt="">
					<p>
						Album name: <?php echo $a['name'];?><br/>
						Owner: <?php echo $a['alias'];?><br/>
						Upload date: <?php echo date("d/m/Y", $a['created']);?><br/>
					</p>
				</div>
				<?php }?>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<?php
	}
	//Hvis denne bruger har contributed vis næste div
	$q = mysqli_query($con, "SELECT * FROM AlbumContributors INNER JOIN Albums ON AlbumContributors.albumID=Albums.albumID INNER JOIN Users ON Users.userID=Albums.userID WHERE contributorID=$uID");
	if(mysqli_num_rows($q) > 0){
?>
<div class="productive.ly">
	<div id="cbp-so-scroller" class="cbp-so-scroller">
		<div class="content_top">
			<div class="ipad_desc album-list" id="about">
				<h3>Albums you contributed to</h3>
				<?php while($a = mysqli_fetch_array($q)){ $aID = $a['albumID'];?>
				<div class="albumPreview" onclick="window.location.href='/album/<?php echo $a['albumID'];?>';">
					<img src="/img/profile/<?php echo $r['pic'];?>" alt="">
					<p>
						Album name: <?php echo $a['name'];?><br/>
						Owner: <?php echo $a['alias'];?><br/>
						Upload date: <?php echo date("d/m/Y", $a['created']);?><br/>
					</p>
				</div>
				<?php }?>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<?php
	}
    include ROD."include/foot.php";
?>