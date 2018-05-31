
<?php include 'includes/connect.php';
     require_once("includes/poruka.php");   
   require_once("includes/function.php");   

	
	if(isset($_POST['submit'])){
	
		 $category=mysqli_real_escape_string($conn,$_POST["category"]);
			date_default_timezone_set("Asia/Karachi");
			$CurrentTime=time();
			//$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
			$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
			$DateTime;
	        $Admin="Dina Ahmetspahic";
	if (empty($category)){
   
		    echo "<script>
		alert('There are no fields to generate a report');
		window.location.href='categories.php';
		</script>";
		exit();
		}
	

	elseif(strlen($category)>99){
					  echo "<script>
				alert('Predug naziv za kategoriju');
				window.location.href='categories.php';
				</script>";
	
    }

     else{
	
			$insert_query= "INSERT INTO categories (vrijeme,ime,potpis)
			VALUES('$DateTime','$category','$Admin')";

      if(mysqli_query($conn,$insert_query)){
		
	        echo "<script>alert('Data inserted into table')</script>";
	    } 

	else {
   			echo "<script>
			alert('Category failed to Add');
			window.location.href='categories.php';
			</script>";
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
		<title>Dashboard</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- google font-->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!-- ekko-lightbox -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.css">
		<!-- main css -->
	
		<link rel="stylesheet" href="css/bootstrap.min.css">
                <script src="js/jquery-3.2.1.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
         <link rel="stylesheet" href="css/adminstyles.css">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
       


		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	</head>
<body>
	<nav class="navbar navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
		data-target="#collapse">
		<span class="sr-only">Toggle Navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="Blog.php">
	   <img style="margin-top: -12px;" src="images/jazebakramcom.png" width=200;height=30;>
	</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">

						<div class="btn-group navbar-right">
							<button type="button" class="btn navbar-btn btn-primary">Dina Ahmetspahić</button>
							<button type="button" class="btn navbar-btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<ul class="dropdown-menu">
							

															</ul>
						</div>


					</div>
					<!-- /.navbar-collapse -->
		</div>
		
	</div>
</nav>

  <div class="container-fluid">
	<div class="row">
		
		<div class="col-sm-3" ">
		
			<h3>Admin Panel</h3>
			<ul id="Side_Menu" class="nav nav-pills nav-stacked">
				<li >
				<a href="admin.php">
				<span class="glyphicon glyphicon-th"></span>
				&nbsp;Nadzorna ploča</a></li>
				<li><a href="postsearch.php">
				<span class="glyphicon glyphicon-list-alt"></span>
				&nbsp;Objave</a></li>
				<li ><a href="categories.php">
				<span class="glyphicon glyphicon-tags"></span>
				&nbsp;Kategorije</a></li>
				<li class="active"><a href="users.php">
				<span class="glyphicon glyphicon-user"></span>
				&nbsp;Upravljenje &nbsp;&nbsp;korisnicima</a></li>
				<li><a href="Blog.php?Page=1" target="_Blank">
				<span class="glyphicon glyphicon-equalizer"></span>
				&nbsp;Sider</a></li>
				<li><a href="Logout.php">
				<span class="glyphicon glyphicon-log-out"></span>
				&nbsp;Logout</a></li>	
		
			</ul>
          
		</div> <!--siderbar Nav-->

			<div class="col-sm-9">
			  <h1>Manage Categories</h1>
		 <div>
				<form action="categories.php" method="post">
			<fieldset>
				 <div class="form-group">
				<label for="categoryname">Ime:</label>
				<input class="form-control" type="text"  name="category" id ="categoryname" placeholder="Ime kategorije" size="100"/>
			</div>	
			<br>
			    <input class="btn btn-info btm-block" type="submit" name="submit" value="Dodaj novu kategoriju"/>
			
			</fieldset>
			    
				</form>
		</div>
<div class="">
			<table class="table">
				<th>Id</th>
				<th>Datum i vrijeme</th>
				<th>Kategorija</th>
				<th>Ime autora</th>

<?php 

	$result_query = "SELECT * FROM categories";
	
	$run_result = mysqli_query($conn,$result_query);
    

	while($row_result = mysqli_fetch_array($run_result)){
		
		$id=$row_result['id'];
		$vrijeme=$row_result['vrijeme'];
		$ime=$row_result['ime'];
		$potpis=$row_result['potpis'];
	
		echo"<tr>

			<td>$id</td>
			<td>$vrijeme</td>
			<td> $ime</td>
			<td> $potpis</td>
</tr>
			";
		
}


?>

</table>


			
</div>

			 </div><!--main content-->
     
    </div> <!-- end row-->
 
     </div>	<!--container fluid-->
    
             <div class="col-sm-9">
			  <div class="row"></div>
			  <div class="row"></div>
		</div>
 </div><!--container-->



     </div>	<!--container fluid-->
        </div> <!-- end row-->
	          
 </div><!--container-->

<nav class="navbar navbar-default navbar-fixed-bottom ">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">uključi navigaciju</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav nav-justified footer-nav">
			
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>


</body>
</html>