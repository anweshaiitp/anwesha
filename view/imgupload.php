<?php
session_start();
///############# User not logged in
	if(!isset($_SESSION['userID'])){
		echo "Login first";
		exit();

    }
    // echo json_encode($match);
//img upload
$imgerr = "";
$cover_url = null;
		$target_file = null;
		if(isset($_FILES['fileToUpload'])){
		$target_dir = "posters/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		$target_file = $target_dir.$match[1].'.'.$imageFileType;
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			// echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			// echo "File is not an image.";
			$uploadOk = 0;
		}
		$typea= ($imageFileType=="png")?"png":"jpeg";
		$typeanchor = "<a target='_blank' href='http://compress".$typea.".com/'>compress".$typea.".com</a>";

		if ($_FILES["fileToUpload"]["size"] > 300000) {
			echo "Sorry, your file is too large.";
			$imgerr = "<h3 style='color:red'><b>Image too large. Can't be > 300kb. Use image compressor:</b></h3> $typeanchor<br>";
			$uploadOk = 0;
		}
		if ($uploadOk == 0) {
			$target_file = null;
			echo "Sorry, your file was not uploaded. Too large. compress at $typeanchor  ";
		// if everything is ok, try to upload file
		} else {
			
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

				$cover_url = "https://anwesha.info/".$target_file;
				
				
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}

		}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1><?php echo $imgerr; ?></h1>
    <h1>  <?php if($cover_url) echo "Enter the following URL into the poster url on the form.<br>". $cover_url; ?> </h1>
    <form action="" method="post" enctype="multipart/form-data">
        select image here:<input type="file" name="fileToUpload">
        <input type="submit" value="submit">
    </form>
</body>
</html>