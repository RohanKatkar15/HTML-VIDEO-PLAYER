<?php 

include("db.php");

if (isset($_POST['upload'])) {
	// $name = $_FILES['file'];
	// echo "<pre>";
	// print_r($name);
	// exit();
	$file_name = $_FILES['file']['name'];
	$file_type = $_FILES['file']['type'];	
	$temp_name = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	
	$file_destination = "upload/".$file_name;

	if (move_uploaded_file($temp_name,$file_destination)) { 
	
	$q = "INSERT INTO video (name) VALUES ('$file_name')";

	if(mysqli_query($conn,$q)) {

		$success = "Video uploaded successfully.";
	}
	else {
		
		$failed = "Something went wrong??";
	}
}
else {

	$msz = "Please select a video to upload..!";
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload Videos</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<!-- <script src="assets/js/jquery.min.js"></script> -->
	<style type="text/css">
		#next{
			text-align: right;
			margin-right: 20px;
			color: yellow;
		}
		#back{
			margin-top: 390px;
			margin-left: 20px;
			color: black;
		}
	</style>
</head>
<body style="background: url(https://cdn.pixabay.com/photo/2016/06/02/02/33/triangles-1430105_1280.png);">

	<div class="container mt-3">
		
				<h1 class="text-center mb-5" style="color: yellow;"><b>Upload Videos </b></h1>
				<div class="col-lg-8 m-auto">
				<form action="upload.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label style="color: white;"><strong>Upload a Video:</strong></label>
						 <input type="file" name="file" class="form-control">
					</div>
					<?php if(isset($success)) { ?>
					<div class="alert alert-success">

						

							<?php echo $success;?>

					</div>
					<?php } ?>
					<?php if(isset($failed)) { ?>
					<div class="alert alert-danger">

						

							<?php echo $failed;?>

					</div>
					<?php } ?>

					<?php if(isset($msz)) { ?>
					<div class="alert alert-danger">

						

							<?php echo $msz;?>

					</div>
					<?php } ?>
					<input type="submit" name="upload" value="Upload" class="btn btn-success ml-3">
				</form>
				</div>

	</div>
	<a href="index.php"><p id="next">>> Uploaded Videos</p></a>
	<!--<a href="demo.html"><p id="back">Home <<</p></a> -->
</body>
</html>