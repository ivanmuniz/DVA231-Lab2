<?php
if( isset($_POST['send_news']) ) {
	var_dump($_FILES);
	$title = htmlspecialchars($_POST['title']);
	$subtitle = htmlspecialchars($_POST['subtitle']);
	$text = htmlspecialchars($_POST['text']);
	$mediaType = htmlspecialchars($_POST['media_type']); $errorMediaType = false;
	if( $mediaType != 'img' && $mediaType != 'video' ) { $errorMediaType = true; }

	$arrayFileType = array( 'img' => array("jpg", "jpeg", "png", "gif"), 'video' => array("mp4", "ogv", "ogg", "avi", "flv") );
	$uploadDir = "../uploads/";
	$fullFilepath = $uploadDir . basename($_FILES["file_upload"]["name"]);
	$fileType = strtolower(pathinfo($fullFilepath, PATHINFO_EXTENSION));
	$foundFileType = null;
	// picture?
	if( array_search(strtolower($fileType), $arrayFileType['img']) ) { $foundFileType = 'img'; }
	// video?
	elseif( array_search($fileType, $arrayFileType['video']) ) { $foundFileType = 'video'; } 
	// error
	else { 
		error_log("Sorry, only JPG, JPEG, PNG, GIF, MP4, OGV, OGG, AVI, FLV files are allowed."); 
		header('Location: ../../frontend/html/admin.php?upload_ok=0&status=1');
	}

	if($foundFileType == 'img' || $foundFileType == 'video' ) {
		if(file_exists($fullFilepath)) {
			error_log("Sorry, file already exists.");
			header('Location: ../../frontend/html/admin.php?upload_ok=0&status=2');
		} else {
			if ($_FILES["file_upload"]["size"] > 5242880) {
				error_log("Sorry, your file is too large.");
				header('Location: ../../frontend/html/admin.php?upload_ok=0&status=3');
			} else {
				if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $fullFilepath)) {
					error_log("The file ". basename( $_FILES["file_upload"]["name"]). " has been uploaded.");
					header('Location: ../../frontend/html/admin.php?upload_ok=1');
				} else {
					error_log("Sorry, there was an error uploading your file.");
					header('Location: ../../frontend/html/admin.php?upload_ok=0&status=4');
				}
			}
		}
	}
} 
?>
