<!DOCTYPE html>
<html>
<head>
	<title>The first bootstrap page</title>
	<style>
   .jumbotron{
        display: inline-block;
        width: 3em;
        padding: 0.9em 0;
        margin: 0.5em;
        text-align: center;
        background: yellow;
        border-radius: 50%;
      }
    </style>   
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</head>
<body>
	<div>
		<div class="jumbotron">
			<center><h1>Login Form</h1></center>      
		</div>
		
		<div class="container">
				<a href="index.php?action=register">Register</a>
			<br/>
			<br/>
			<form class="form-horizontal" action="index.php?action=login" method="post">
				<div class="form-group">
					<div class="row">
						<div class="col-md-6 col-xs-6">
							<label for="email">Email address:</label>
						</div>
						<div class="col-md-6 col-xs-6">
							<input type="email" class="form-control" name="email" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-6 col-xs-6">
							<label for="pwd">Password:</label>
						</div>
						<div class="col-md-6 col-xs-6">
							<input type="password" class="form-control" name="pwd" required>
						</div>

					</div>
				</div>

					<center>
						<button type="submit" class="btn btn-primary">Login</button>
					</center>

				</form>



			</div>
		</div>

	</body>
	</html>