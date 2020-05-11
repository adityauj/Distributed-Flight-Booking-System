<?php 


session_start();
$hostname = "localhost";
$mysql_user = "root";
$password  = "";
$database = "Flight";

$bd = mysql_connect($hostname, $mysql_user, $password) or die("Oops some thing went wrong");
mysql_select_db($database, $bd) or die("Oops some thing went wrong");

$name = $_POST['f_name'];
$dob = $_POST['dob'];
$pp_id = $_POST['passport'];
$flight_id= $_SESSION['flight_id'];
$seats= $_SESSION['seats'];
$source = $_SESSION['source'];
$dest = $_SESSION['dest'];
$cost = $_SESSION['cost'];
$fname = $_SESSION['fname'];



$querr = "select Available_Seats from Flight where Flight_id = '$flight_id'";
$result = mysql_query($querr);
while($data = mysql_fetch_array($result))
{
$avail = $data['Available_Seats'];

}
$avail1 = $avail - $seats;

$insert = "insert into Booking values('$name', '$dob', '$pp_id', '$flight_id', $seats)";


mysql_query($insert);


$querr = "update Flight set Available_Seats = '$avail1' where Flight_id = '$flight_id'";
mysql_query($querr);


mysql_close($bd);
?>

<!DOCTYPE html>
<html lang = "en">
   
   <head>
      <meta charset = "utf-8">
      <meta http-equiv = "X-UA-Compatible" content = "IE = edge">
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">
      
      <title></title>
      
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
		<h1>Congratulations !!</h1>
		<h2>Ticket booked</h2>
		<div class = "col-md-12">
			<div class = "row">
				<div>
				<table class="table table-responsive">
				    	<thead class = "thead-dark">
						<tr>
							<th>Name</th>
							<th>Flight number</th>
							<th>Flight name</th>
							<th>Source</th>
							<th>Destination</th>
							<th>Total seats</th>
							<th>Cost</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $name; ?></td>
							<td><?php echo $flight_id; ?></td>
							<td><?php echo $fname; ?></td>
							<td><?php echo $source; ?></td>
							<td><?php echo $dest; ?></td>
							<td><?php echo $seats; ?></td>
							<td><?php echo ($cost*$seats); ?></td>
						</tr>
					</tbody>
				  </table>
			</div>
			</div>
		</div>
		
	</div>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src = "js/jquery-3.3.1.min.js"></script>
      
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src = "js/bootstrap.min.js"></script>
      
   </body>
</html>
<?php 
$hostname = "192.168.1.100";
$mysql_user ="Any";
$password  = "";
$database = "Flight";

$bd = mysql_connect($hostname, $mysql_user, $password)or false;
mysql_select_db($database, $bd)or false;

$insert = "insert into Booking values('$name', '$dob', '$pp_id', '$flight_id', $seats)";


mysql_query($insert);


$querr = "update Flight set Available_Seats = '$avail1' where Flight_id = '$flight_id'";
mysql_query($querr);
mysql_close($bd);



$hostname = "192.168.1.104";
$mysql_user ="Any";
$password  = "";
$database = "Flight";

$bd = mysql_connect($hostname, $mysql_user, $password) or false;
mysql_select_db($database, $bd)or false; 
$insert = "insert into Booking values('$name', '$dob', '$pp_id', '$flight_id', $seats)";


mysql_query($insert);


$querr = "update Flight set Available_Seats = '$avail1' where Flight_id = '$flight_id'";
mysql_query($querr);
mysql_close($bd);


?>
