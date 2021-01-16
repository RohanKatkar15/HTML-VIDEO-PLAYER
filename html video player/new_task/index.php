<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<title>Display All Videos from database using php</title>
	<style type="text/css">
		#back{
			margin-top: 300px;
			margin-left: 20px;
			color: black;
		}
	</style>
</head>
<body style="background: url(https://cdn.pixabay.com/photo/2017/03/25/17/55/color-2174045_1280.png);">

	<div class="container mt-3 mb-3">
		<center><h1><b>Display All Uploaded Videos</b></h1></center>
		<hr/>
				<a href="upload.php" class="btn btn-primary mt-3">Upload a New Video</a>
				
				<hr/>
		<div class="row">
				<?php
				include("db.php");
					
				$q = "SELECT * FROM video";

				$query = mysqli_query($conn,$q);
				
				while($row=mysqli_fetch_array($query)) { 

					$name = $row['name'];
					?>

					<div class="col-md-4">
						<video width="100%" controls>
<source src="<?php echo 'upload/'.$name;?>">
</video>
					</div>

				<?php }
?>
</div>
				</div>
				<!--<a href="demo.html"><p id="back">Home <<</p></a>-->
</body>
</html>