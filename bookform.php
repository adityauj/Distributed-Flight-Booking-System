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
//echo $Flight_id;

$seats= $_SESSION['seats'];
$_SESSION['seats'] = $seats;
$_SESSION['flight_id'] = $Flight_id;
echo $seats;


?>


<html>
<head>
	<title>Book Seats</title>
</head>
<body>

	<center><div id = "book">
		<form method = "POST" action = "action.php">
			<input type = "text" placeholder = "Enter name" name = "f_name"><br><br>
			<input type = "text" placeholder = "Enter passport id" name = "passport"><br><br>
			<label><?php echo 'Flight Number : '.$Flight_id; ?></label><br><br>
			<label><?php echo 'Seats  : '.$seats ?></label><br><br>
			<input type = "text" placeholder = "Date of birth (YYYY-MM-DD)" name = "dob"><br><br>
			<input type = "submit" name = "bookseat" value = "Book"><br><br>
			
		</form> 
	</div></center>
</body>
</html>



