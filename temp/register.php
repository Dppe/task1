<!DOCTYPE html>
<html>
<head>
	<title>The second bootstrap page</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div>
		<div class="jumbotron">
			<center><h1 class="text-primary">Registration form</h1></center>      
		</div>
		<div class="container">
			<form  method="post" class="form-horizontal" action="temp/registerdb.php">
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" placeholder="Write your name" class="form-control"  name="name" required/>
				</div>
				<div class="form-group">
					<label for="division">Division:</label>
					<input type="text" placeholder="Write your Divison" class="form-control"  name="division" required/>
				</div>
				<div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" placeholder="Write your Email address" class="form-control" name="email" required/>
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" placeholder="Write your password" class="form-control" name="pwd" required/>
				</div>
				<div class="form-group">
					<label for="pwd1">Confirm Password:</label>
					<input type="password" placeholder="Confirm your password" class="form-control"  name="pwd1" required/>
				</div>
				<center>
					<button type="submit" class="btn btn-primary">submit</button>
				</center>
			</form> 


		</div>
	</div>

</body>
</html>