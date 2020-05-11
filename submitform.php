<?php 


session_start();
$hostname = "localhost";
$mysql_user = "root";
$password  = "";
$database = "Flight";

$bd = mysql_connect($hostname, $mysql_user, $password) or die("Oops some thing went wrong");
mysql_select_db($database, $bd) or die("Oops some thing went wrong");

foreach($_POST as $name => $content) 
{ // Most people refer to $key => $value
  $Flight_id =  $name;
   
}

$seats= $_SESSION['seats'];
$_SESSION['seats'] = $seats;
$_SESSION['flight_id'] = $Flight_id;

$source = $_SESSION['source'];
$dest   = $_SESSION['dest'];

$query = "select Cost,Flight_name from Flight where Flight_id = '$Flight_id'";
$result = mysql_query($query);

$row = mysql_fetch_array($result);
$cost = $row["Cost"];
$fname = $row["Flight_name"];

$_SESSION['fname'] = $fname;
$_SESSION['source'] = $source;
$_SESSION['dest'] = $dest;
$_SESSION['cost'] = $cost;

?>





<!DOCTYPE html>
<html lang = "en">
   
   <head>
      <meta charset = "utf-8">
      <meta http-equiv = "X-UA-Compatible" content = "IE = edge">
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">
      
      <title>Fill information</title>
      
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
	<h1>Book flight : <?php echo $Flight_id. " ( ". $source . " to ". $dest." )" ?></h1>
	
	<form action = "conf.php" method = "POST">
	<div class = "col-md-12">
	<div class = "row">
		
		<div class = "col-md-4">
			<div class = "row">
				<div class = "form-group">
					<label for = "cname">Name :</label>
					<input type = "text" id = "cname" class = "form-control" name = "f_name">
				</div>
			</div>
			<div class = "row">
				<div class = "form-group">
					<label for = "dob">Date of birth :</label>
					<input type = "text" id = "dob" class = "form-control" name = "dob">
				</div>
			</div>
			<div class = "row">
				<div class = "form-group">
					<label for = "cost">cost per seat :</label>
					<input type = "text" id = "cost" class = "form-control" value = "<?php echo $cost; ?>"readonly>
				</div>
			</div>
			
			
		</div>
		
		<div class = "col-md-4">
			<div class = "row">
				<div class = "form-group">
					<label for = "pass">Passport number : </label>
					<input type = "text" id = "pass" class = "form-control" name = "passport">
				</div>
			</div>
			<div class = "row">
				<div class = "form-group">
					<label for = "seats">Seats :</label>
					<input type = "text" id = "seats" class = "form-control" value = "<?php echo $seats ?>" readonly>
				</div>
			</div>
			<div class = "row">
				<div class = "form-group">
					<label for = "totalc">Total cost :</label>
					<input type = "text" id = "totalc" class = "form-control" value = "<?php echo ($seats * $cost); ?>"readonly>
				</div>
			</div>
		</div>
		
	</div>
	<div class = "row">
		<div class = "form-group">
			<input type = "submit" class = "btn btn-danger" value = "confirm">
		</div>
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

