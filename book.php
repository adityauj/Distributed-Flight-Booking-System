<?php 


session_start();
$hostname = "localhost";
$mysql_user = "root";
$password  = "";
$database = "Flight";

$bd = mysql_connect($hostname, $mysql_user, $password) or die("Oops some thing went wrong");
mysql_select_db($database, $bd) or die("Oops some thing went wrong");


if (isset($_POST['search'])) 
		{    
		
			switch ($_POST['search']) 
			{
				case 'search':
				
				
				$source = $_POST['source'];
				$dest = $_POST['destination'];
				$seats = $_POST['seats'];
	
				$_SESSION['seats'] = $seats;
				$_SESSION['source'] = $source;
				$_SESSION['dest'] = $dest;

				$result = mysql_query("SELECT * FROM Flight where Available_Seats >= $seats AND Destination = '$dest' AND Source =        					'$source'");
				
				if(empty($result))
				{
					echo "Sorry No Flights Avaliable !! Fly with us dsfsdfsdf next time ! :)";
				}
				else{

?>











<!DOCTYPE html>
<html lang = "en">
   
   <head>
      <meta charset = "utf-8">
      <meta http-equiv = "X-UA-Compatible" content = "IE = edge">
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">
      
      <title>book flight</title>
      
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
		<h1>Available flights</h1>
		<div class = "col-md-12">
			<div class = "row">
				<div>
					<form action = "submitform.php" method = "POST">
					<table class="table table-responsive">
					<thead class = "thead-dark">
						<tr>
							<th>Flight number</th>
							<th>Flight name</th>
							<th>Source</th>
							<th>Destination</th>
							<th>Availabe seats</th>
							<th>Cost</th>
							<th></th>
							
						</tr>
					</thead>
					<tbody>
						
						
		<?php 
			while($data = mysql_fetch_array($result)){										  			?>	
						<tr>
							<td><?php echo $data['Flight_id']; ?></td>
							<td><?php echo $data['Flight_name']; ?></td>
							<td><?php echo $data['Source']; ?></td>
							<td><?php echo $data['Destination']; ?></td>
							<td><?php echo $data['Available_Seats']; ?></td>
							<td><?php echo $data['Cost']; ?></td>
							<td><input type = "submit" value = "Book" name = "<?php echo $data['Flight_id'];?>" class= "btn btn-danger"></td>
						</tr>
						<?php 
							 }
							}
							}
							}

						?>
					</table>
					</form>
				</div>
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

	
