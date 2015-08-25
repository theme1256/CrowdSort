<?php
	session_start();
	
	$con = mysqli_connect("localhost","crowdsort","938vxFySrTxfRSAz","crowdsort","3306");
	if (!$con){die("Failed to connect to MySQL:" . mysqli_connect_error());}

	//Defines
	define("ROD","/var/www/crowdsort/");
	define("RSCRIPTS",ROD."scripts/");
	define("HOME","/");
	define("SCRIPTS",HOME."scripts/");
	define("CSS",HOME."css/");
	define("JS",HOME."js/");
	define("PLUGIN",SCRIPTS."plugins/");
	define("IMG",HOME."img/");
	define("AJAX",HOME."ajax/post/");
	define("INCLUDE",HOME."ajax/include/");
	$dato = date("Y-m-d H:i:s");

	//Lorem ipsum i forskellige længder
	define("LOREM1", "<br/>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent interdum, felis sit amet porta egestas, dolor libero tincidunt ex, eu pulvinar erat nisi ac nisi. Donec vel congue ex. Donec vehicula massa tellus, ut iaculis ligula tincidunt eget. Pellentesque varius, nisl eu posuere venenatis, dui metus ultrices urna, eget accumsan urna sapien in orci. Proin faucibus accumsan convallis. Nullam ornare magna diam, quis pharetra velit fringilla quis. Cras accumsan nisi non nisi imperdiet aliquet. Nunc efficitur lectus tempor est sodales, et scelerisque justo semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In vel nibh eu nunc vehicula pretium. Curabitur ornare congue risus, id sodales lacus maximus et. Etiam aliquam faucibus consequat. Nulla facilisi. Praesent viverra felis eu tristique porta. Curabitur id enim neque. Etiam suscipit elit mi, fermentum iaculis massa pharetra eget.<br/>");
	define("LOREM2", LOREM1."<br/>Fusce facilisis condimentum quam et commodo. Vestibulum at lectus sed lacus efficitur pulvinar facilisis vel erat. Vestibulum a luctus augue. Vestibulum justo neque, convallis in eros sit amet, vestibulum viverra enim. Nullam sit amet arcu id mi interdum venenatis. Morbi finibus elit vel turpis venenatis, ut consequat sapien venenatis. Etiam elementum enim vitae venenatis pharetra. Maecenas vitae leo laoreet, dignissim ex sed, consectetur lorem. In sodales neque nisl. Donec at maximus est, eget tincidunt lectus. Nunc velit ipsum, congue nec scelerisque non, maximus eu diam. Nam aliquet hendrerit nunc et varius. Aenean neque sapien, lobortis auctor turpis sit amet, luctus efficitur nisl. Nullam facilisis pulvinar augue vitae commodo.<br/>");
	define("LOREM3", LOREM2."<br/>Nunc porta, enim sit amet tincidunt convallis, felis urna convallis ante, non consequat nibh orci vel nulla. Nulla ultrices massa augue, ut cursus orci efficitur et. In tincidunt orci erat, quis hendrerit odio ullamcorper eu. Aenean iaculis arcu felis, nec ullamcorper urna sagittis eget. Ut ut lorem leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam eget ultrices nibh.<br/>");
	define("LOREM4", LOREM3."<br/>Nulla in sollicitudin purus, in faucibus eros. Nullam lobortis vestibulum consequat. Pellentesque viverra dolor non justo pretium tempor. Nunc vestibulum at velit eu fermentum. Nullam sit amet dolor dui. Integer nec interdum nisi. Nulla sit amet scelerisque mauris, nec commodo tellus. Proin eu mauris elementum, hendrerit lectus non, blandit odio. Phasellus enim leo, porttitor eget rhoncus nec, congue a tortor. In ultrices diam at risus malesuada suscipit. Etiam ligula lectus, luctus bibendum mattis a, cursus ut tortor.<br/>");
	define("LOREM5", LOREM4."<br/>Nam cursus mauris sit amet enim congue volutpat. Mauris ut justo vitae mauris bibendum interdum. Mauris mattis interdum lacinia. Vivamus in nulla ultricies, bibendum tortor vel, commodo turpis. Morbi felis lacus, interdum vel sem in, consectetur posuere nulla. Sed vel blandit lorem. Morbi leo orci, malesuada et ipsum eget, posuere lobortis diam. Duis et accumsan dui. Integer eu velit tincidunt, efficitur urna non, fringilla metus. Nam sed tortor sit amet massa iaculis lobortis. Donec nec felis commodo, fermentum magna at, pellentesque justo. Suspendisse mattis est at nunc auctor imperdiet.<br/>");
	define("LOREM6", LOREM5."<br/>Morbi eget turpis quis lacus fermentum placerat. Aliquam vel mi odio. Curabitur a nisi imperdiet, suscipit purus id, malesuada justo. Morbi non tortor non massa tristique euismod id sit amet lorem. Ut pulvinar volutpat tellus, sed maximus libero faucibus vestibulum. Integer tempor fringilla dolor id hendrerit. Sed ac pellentesque mauris, quis tincidunt lorem. In hac habitasse platea dictumst. Nullam vulputate libero ac tortor tempor sodales. Morbi maximus hendrerit facilisis.<br/>");
	define("LOREM7", LOREM6."<br/>Morbi sit amet cursus eros, non congue eros. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce sed sollicitudin velit, sed rutrum ante. In mollis non leo sit amet lacinia. Aliquam blandit, dolor nec semper finibus, neque elit pulvinar nulla, non mollis magna ipsum id odio. Maecenas interdum sapien nec auctor vulputate. Nam pulvinar suscipit enim ac pellentesque. Mauris cursus nec turpis ac pulvinar. Sed bibendum nibh et sem tincidunt, vel interdum velit aliquam. Phasellus bibendum lacus ut ex faucibus, id hendrerit felis pulvinar. Phasellus orci risus, dignissim sit amet varius eget, facilisis ut nulla. Nullam faucibus accumsan augue eget volutpat. Duis a ante luctus, vestibulum arcu et, semper lorem. Morbi at leo rhoncus, blandit lorem a, fringilla magna. Donec vel felis eget neque elementum mattis.<br/>");
	define("LOREM8", LOREM7."<br/>Donec bibendum posuere est, rutrum interdum sem malesuada ac. Ut lacus odio, malesuada eleifend eros sed, feugiat aliquet lectus. Quisque malesuada lacus non orci feugiat, at auctor lectus porta. Vivamus ultricies lorem id neque accumsan luctus. Fusce id felis odio. Mauris ullamcorper libero dolor, ut sagittis orci rutrum ac. Proin scelerisque enim nec leo imperdiet, sed auctor mauris efficitur. Fusce mollis tortor at consequat porttitor. Cras purus enim, eleifend sed tincidunt in, fermentum a leo. Quisque tincidunt odio libero, non ornare lectus viverra vitae. Proin ultrices enim non scelerisque semper. Curabitur facilisis, nulla iaculis tempor tempor, arcu elit iaculis leo, ac pellentesque felis est at magna. Suspendisse rutrum varius massa sed porta. Donec elementum venenatis arcu, vitae dapibus sapien molestie ultricies. Praesent ut euismod arcu. Aenean quis justo id metus laoreet ultricies.<br/>");
	define("LOREM9", LOREM8."<br/>Nulla a tortor consequat, efficitur ligula in, aliquam neque. Aliquam erat volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin sit amet nunc eleifend, efficitur odio et, fermentum libero. Maecenas viverra vulputate sodales. Praesent ut lobortis felis. Aliquam sit amet dapibus nisl, vel lacinia eros. Morbi nec luctus ligula. Morbi finibus, turpis eu congue auctor, dui libero eleifend ipsum, a mollis magna dui ut massa.<br/>");
	define("LOREM10", LOREM9."<br/>Nam eleifend mauris ligula, eu dapibus sapien venenatis non. Donec tortor arcu, cursus sit amet euismod nec, fermentum aliquet elit. Duis ultricies leo vel libero facilisis viverra. Vivamus iaculis eleifend nulla sit amet varius. Maecenas dapibus lorem ut lectus mattis dapibus. Integer a finibus lorem. Aliquam auctor, felis in sollicitudin aliquet, enim ante consectetur enim, ullamcorper iaculis mauris urna nec lorem. Morbi viverra, urna non fringilla iaculis, velit leo mollis est, euismod efficitur mi lacus at dolor. Ut in posuere justo. Donec bibendum viverra sodales.<br/>");
	define("LOREM11", LOREM10."<br/>Fusce feugiat libero ex, a feugiat dolor fringilla sit amet. Nulla imperdiet nibh nec purus pulvinar porta. Nullam ut tellus ut neque dapibus ornare. Praesent sit amet venenatis mi. Aenean lacus lectus, accumsan et tempor ut, feugiat non ligula. Proin a massa ac odio fringilla feugiat. Suspendisse sagittis bibendum semper. Pellentesque in facilisis turpis.<br/>");
	define("LOREM12", LOREM11."<br/>Ut lacinia varius viverra. Aliquam hendrerit leo arcu, eget cursus ligula ultricies vel. Vestibulum sagittis libero sollicitudin urna lobortis, ultricies pellentesque ipsum maximus. Donec quis pulvinar ex, venenatis mattis enim. Quisque aliquam vel mi at tincidunt. Pellentesque vel malesuada quam, semper ultrices enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla lacinia sollicitudin nunc, eu feugiat tellus ultrices at. Aenean pretium enim ut magna varius malesuada. In sed ante dignissim, iaculis justo in, viverra urna. Sed sit amet magna ut sapien rutrum ultricies. In volutpat placerat tellus, id rutrum lacus dictum in. Nulla sagittis lobortis enim vitae sagittis. Sed pellentesque pretium ipsum, in blandit tortor. Aenean dictum enim vel ex pulvinar, eu volutpat ex molestie.<br/>");

	//funktioner
	function rens($felt){
		$felt = stripslashes($felt);
		$felt = strip_tags($felt);
		$felt = addslashes($felt);
		return $felt;
	}

	function encrypt($p){
		$p = rens($p);
		$s = sha1(md5($p));
		return md5($p.$s);
	}

	function checkAccess(){
		if($_SESSION["alias"] != "" || isset($_SESSION['alias'])){
			return true;
		}
		else{
			return false;
		}
	}

	function curPageName(){
		$var = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
		$var = explode(".", $var);
		return $var[0];
	}

	function generatePass($length = NULL){
		if($length == NULL){$length = 10;}
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	
	function make_thumb($folder,$src,$thumb_width) {
		$source_image = imagecreatefromjpeg($folder.$src);
		$width = imagesx($source_image);
		$height = imagesy($source_image);
		$thumb_height = floor($height*($thumb_width/$width));
		$virtual_image = imagecreatetruecolor($thumb_width,$thumb_height);
		imagecopyresampled($virtual_image,$source_image,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
		imagejpeg($virtual_image, $folder."thumbs/".$src,100);
	}
	
	$sites = array("index", "register", "login", "activate");
	if(!checkAccess() && !in_array(curPageName(), $sites) && curPageName() != "about"){
		header("Location: /");
	}
	elseif(checkAccess() && in_array(curPageName(), $sites) && curPageName() != "about"){
		header("Location: /home");
	}

	if(curPageName() == "image" && !isset($_GET['ID'])){
		header("Location: /home");
	}
?>