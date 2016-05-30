<?php
	include "/var/www/crowdsort/include/top.php";

	header("Content-Type: application/json");
	//error_log($_FILES['file']['name']);
	//echo '{ "error": "File could not be saved." }';

	$allowed = array("jpg", "png", "PNG", "JPG", "jpeg", "JPEG");
	$path = ROD."img/profile/";

	if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){

		$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

		if(!in_array(strtolower($extension), $allowed)){
			echo '{"status":"error"}';
			exit;
		}

		$maxDim = 800;
        list($width, $height, $type, $attr) = getimagesize( $_FILES['file']['tmp_name'] );
        if ( $width > $maxDim || $height > $maxDim ) {
            $target_filename = $_FILES['file']['tmp_name'];
            $fn = $_FILES['file']['tmp_name'];
            $size = getimagesize( $fn );
            $ratio = $size[0]/$size[1]; // width/height
            if( $ratio > 1) {
                $width = $maxDim;
                $height = $maxDim/$ratio;
            } else {
                $width = $maxDim*$ratio;
                $height = $maxDim;
            }
            $src = imagecreatefromstring( file_get_contents( $fn ) );
            $dst = imagecreatetruecolor( $width, $height );
            imagecopyresampled( $dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );
            imagedestroy( $src );
            imagepng( $dst, $target_filename ); // adjust format as needed
            imagedestroy( $dst );
        }

		if(move_uploaded_file($_FILES['file']['tmp_name'], $path.md5($_FILES['file']['name'].$dato))){
			chmod($path.md5($_FILES['file']['name'].$dato), 0777);
			mysqli_query($con,"UPDATE Logins SET pic='".md5($_FILES['file']['name'].$dato)."' WHERE userID=".$_SESSION['userID']);
			echo '{"status":"success"}';
			exit;
		}
	}

	echo '{"status":"error"}';
	exit;
?>