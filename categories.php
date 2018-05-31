
<?php include 'includes/connect.php';
     require_once("includes/poruka.php");   
   require_once("includes/function.php");    
if(isset($_POST['submit'])){
	
		 $category=mysqli_real_escape_string($conn,$_POST["category"]);
			date_default_timezone_set("Europe/Sarajevo");
			$CurrentTime=time();
			//$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
			$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
			$DateTime;
	        $Admin="Dina Ahmetspahic";
	if (empty($category)){
   
		   $_SESSION["Crvena"]="All Fields must be filled out";
	Redirect_to("categories.php");
		exit();
		}
	

	elseif(strlen($category)>99){
				$_SESSION["Crvena"]="Too long Name for Category";
		Redirect_to("categories.php");
	
    }

  else{
	
		$insert_query= "INSERT INTO kategorije (vrijeme,ime,potpis)
						VALUES('$DateTime','$category','$Admin')";

      if(mysqli_query($conn,$insert_query)){
		
		$_SESSION["Zelena"]="Category Added Successfully";
		Redirect_to("categories.php");
	    }else {
   			
		$_SESSION["Crvena"]="Category failed to Add";
		Redirect_to("categories.php");
	
		
	}
	
}	

}
?>

<!DOCTYPE html>
<html lang="bs">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Categories</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- google font-->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!-- ekko-lightbox -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.css">
		<!-- main css -->
	
		
         <link rel="stylesheet" href="css/adminstyles.css">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
       


		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<!-- G Analytics -->
	
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

	</head>
<body>
	


  <div class="container-fluid">
	<div class="row">
	<header>
                <nav class="navbar-fixed-top">
                    <ul>
                        <div class="navbar-right">
                        <li>Dina Ahmetspahic</li></div>
                    </ul>
                 </nav>
        </header> 
	<div class="col-sm-3">
	
			<h2>Admin Panel</h2>
			<ul id="Side_Menu" class="nav nav-pills nav-stacked">
				<li >
				<a href="admin.php">
				<span class="glyphicon glyphicon-th"></span>
				&nbsp;Nadzorna ploča</a></li>
				<li><a href="postsearch.php">
				<span class="glyphicon glyphicon-list-alt"></span>
				&nbsp;Search</a></li>
				<li><a href="blog.php">
				<span class="glyphicon glyphicon-list-alt"></span>
				&nbsp;Blog Post</a></li>
				<li class="active"><a href="categories.php">
				<span class="glyphicon glyphicon-tags"></span>
				&nbsp;Kategorije</a></li>
				<li><a href="gallery.php">
				<span class="glyphicon glyphicon-equalizer"></span>
				&nbsp;Sider</a></li>
			<!--	<li><a href="Logout.php">
				<span class="glyphicon glyphicon-log-out"></span>
				&nbsp;Logout</a></li>	-->
		
			</ul>
        
		</div> <!--siderbar Nav-->

			<div class="col-sm-9">
			<div class="main">			  

			<h3>Upravljanje Kategorijama</h3>
			  <?php echo ZelenaPoruka();?>
			  <?php echo CrvenaPoruka();?>
		 <div>
				<form action="categories.php" method="post">
			<fieldset>
				 <div class="form-group">
				<label for="categoryname"><span class="fieldinfo">Ime:</label>
				<input class="form-control" type="text"  name="category" id ="categoryname" placeholder="Ime kategorije" size="100"/>
			</div>	
		
			    <input class="btn btn-info " type="submit" name="submit" value="Dodaj novu kategoriju"/>
			
			</fieldset>
			    
				</form>
				<br>
				<br>
		</div>
<div class="">

	<table class="table table-responsive">
				<th>Id</th>
				<th>Datum i vrijeme</th>
				<th>Kategorija</th>
				<th>Ime autora</th>

<?php 

	$result_query = "SELECT * FROM kategorije ORDER BY vrijeme  desc ";
	
	$run_result = mysqli_query($conn,$result_query);
    $No=0;

	while($row_result = mysqli_fetch_array($run_result)){
		
		$id=$row_result['id'];
		$vrijeme=$row_result['vrijeme'];
		$ime=$row_result['ime'];
		$potpis=$row_result['potpis'];
		$No++;
		

?>

<tr>

			<td><?php echo $No; ?></td>
			<td><?php echo $vrijeme;?></td>
			<td><?php echo $ime;  ?> </td>
			<td> <?php echo $potpis; ?></td>
</tr>
			
<?php } ?>

</table>
			
</div>


	
</div> <!-- Ending of Main Area-->
	
</div> <!-- Ending of Row-->
	
</div> <!-- Ending of Container-->
</div>

	<div  class="footer container-fluid">
            <div class="container-fluid">
               <span class="text-muted">Place sticky footer content here.</span>
            </div>
    </div>

</body>
</html>