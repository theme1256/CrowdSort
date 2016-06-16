<?php
    include "/var/www/crowdsort/include/head.php";
    if(isset($_GET['key']) && isset($_GET['u'])){
    	$key = rens($_GET['key']);
    	$alias = rens($_GET['u']);
    	if(mysqli_num_rows(mysqli_query($con, "SELECT * FROM Logins WHERE pass='$key' AND alias='$alias'")) == 1){
    		mysqli_query($con,"UPDATE Logins SET activated='1' WHERE pass='$key' AND alias='$alias'");
?>
<div class="productive.ly">
	<div id="cbp-so-scroller" class="cbp-so-scroller">
		<div class="content_top">
			<div class="col-md-6 col-md-offset-3" id="about">
				<h3>Success</h3>
				<p>
					Your acount has been activated and you now have access to this awesome system.<br/>
				</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<?php
    	}
    	else{
?>
<div class="productive.ly">
	<div id="cbp-so-scroller" class="cbp-so-scroller">
		<div class="content_top">
			<div class="col-md-6 col-md-offset-3" id="about">
				<h3>Error</h3>
				<p>
					That combination does not match anything in the system.<br/>
				</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<?php
    	}
	}
	else{
?>
<div class="productive.ly">
	<div id="cbp-so-scroller" class="cbp-so-scroller">
		<div class="content_top">
			<div class="col-md-6 col-md-offset-3" id="about">
				<h3>Just one step left</h3>
				<p>
					An email has been send to you.<br/>
					It contains a link, which you have to click to verify that you are the owner of that email.<br/>
					Once that is done you will be able to use this awesome system.
				</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<?php
	}
    include ROD."include/foot.php";
?>