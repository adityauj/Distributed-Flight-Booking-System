<?php

	$hostname = "localhost";
	$mysql_user = "root";
	$password  = "";
	$database = "Flight";

	$bd = mysql_connect($hostname, $mysql_user, $password) or die("Oops some thing went wrong");
	mysql_select_db($database, $bd) or die("Oops some thing went wrong");

		
		
?>

<!DOCTYPE html>
<html lang = "en">
   
   <head>
      <meta charset = "utf-8">
      <meta http-equiv = "X-UA-Compatible" content = "IE = edge">
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">
      
      <title>index</title>
      
      <!-- Bootstrap -->
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      <link href = "css/custom.css" rel = "stylesheet">
      
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      
      <!--[if lt IE 9]>
      <script src = "https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src = "https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      



	
   </head>
   
   <body class = "bg">
	

      	<div class = "container">
		<h1>Book Flight</h1>
		<form action = "book.php" method = "POST" >
		<div class = "col-md-12">
			<div class = "row">
				<div class = "col-md-4">
					<div class = "row">
						<div class = "form-group">
							<label class="control-label" for = "from">From : </label>
							<select class = "form-control" id = "from" name = "source">
								<option selected="selected">From : city name </option>
								<?php
									$sql="SELECT distinct Source FROM Flight"; 
									$result = mysql_query($sql);
								
									echo $result;
									while($list = mysql_fetch_assoc($result)){
							  		  $category = $list['Source'];
							   		echo "<option value = $category>$category</option>";
									}
								?>
							</select>
					
					
					
						</div>
					</div>
					<div class = "row">
						<div class="form-group"> <!-- Date input -->
						<label class="control-label" for="date">Total seats :</label>
						<input class="form-control" id="seats" name="seats" placeholder="Total seats" type="text" >
      					</div>

					
					</div>
				</div>
				
				<div class = "col-md-4">
					<div class = "row">
						<div class = "form-group">
							<label class="control-label" for = "from">To : </label>
							<select class = "form-control" id = "from" name = "destination">
								<option selected="selected">To : city name </option>
								<?php
			
									$sql="SELECT distinct Destination FROM Flight"; 
									$result = mysql_query($sql);
								
									echo $result;
									while($list = mysql_fetch_assoc($result)){
							  		  $category = $list['Destination'];
							   		echo "<option value = $category>$category</option>";
									}
								?>
							</select>
					
					
					
						</div>
					</div>
					
					
					</div>
				</div>
			</div>
			<div class = "row">
						<?php echo "&nbsp;&nbsp;&nbsp;&nbsp";?><input type = "submit" value = "search" name = "search" class="btn btn-danger btn-lg">
					</div>
		</div>
		</form>
      	</div>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src = "js/jquery-3.3.1.min.js"></script>
      
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src = "js/bootstrap.min.js"></script>
      
   </body>
</html>

