
<!DOCTYPE html>
<html>
<head>
	<title>Result site </title>
	

</head>
<body>
<form action="result.php" method="get">
    <input type="text"  name="user-keyword" size="120"/>
    <input type="submit" name="result" value="Search"/>
</form>
<a href="search.php">Nazad</a>
<?php 
	$conn = mysqli_connect("localhost","root","","travel");

if (mysqli_connect_errno("")){
    echo "Nije uspješno spojeno".mysqli_connect_error();}

if(isset($_GET['search'])){
	
	$get_value = $_GET['user-query'];
	
	if($get_value == ''){
		echo "<center>Nema rezultata</center>";

		exit ();
	}

	$result_query = "select * from sites where site_title like '%$get_value%'";
	
	$run_result = mysqli_query($conn,$result_query);
	
          
	if(mysqli_num_rows($run_result)<1){


		echo "<center>Nista nije pronadjeno</center>";

		exit ();

	}

	while($row_result = mysqli_fetch_array($run_result)){
		
		$site_title=$row_result['site_title'];
		$site_link=$row_result['site_link'];
		$site_desc=$row_result['site_desc'];
		$site_image=$row_result['site_image'];
	
	 echo "<div class='results'>
		
		<h2>$site_title</h2>
		<a href='$site_link' target='_blank'>$site_link</a>
		<p align='justify'>$site_desc</p> 
		<img src='images/$site_image' width='400' height='400' />
		
		</div>";

		}
}


?>
</body>
</html>