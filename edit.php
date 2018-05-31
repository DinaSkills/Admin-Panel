<?php 	include 'includes/connect.php';
     	require_once("includes/poruka.php");   
   		require_once("includes/function.php");   ?> 
	
<?php
if(isset($_POST["Submit"])){
$Title=mysqli_real_escape_string($conn,$_POST["naslov"]);
$Category=mysqli_real_escape_string($conn,$_POST["category"]);
$Post=mysqli_real_escape_string($conn,$_POST["Post"]);
date_default_timezone_set("Europe/Sarajevo");
$CurrentTime=time();
$DateTime=strftime("%d-%m-%Y %H:%M:%S",$CurrentTime);
echo $DateTime;
 $Admin="Dina Ahmetspahic";
$Image=$_FILES["Image"]["name"];
$Target="images/".basename($_FILES["Image"]["name"]);


	$DeleteFromURL=$_GET['Delete'];
	$Query="DELETE FROM blog WHERE id='$DeleteFromURL'";
	
	$Execute=mysqli_query($conn,$Query);
	move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
	if($Execute){
	$_SESSION["Zelena"]="Post Deleted Successfully";
	Redirect_to("admin.php");
	}else{
	$_SESSION["Crvena"]="Something Went Wrong. Try Again !";
	Redirect_to("admin.php");
		
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
								<li><a href="#">Promijeni lozinku</a></li>
								<li><a href="#">Odjavi se</a></li>
								<li role="#" class="divider"></li>
								<li><a href="#">Dodatni materijali</a></li>
								<li><a href="#">Početna stranica</a></li>

															</ul>
						</div>


					</div>
					<!-- /.navbar-collapse -->
		</div>
		
	</div>
</nav>

  <div class="container-fluid">
	<div class="row">
		
		<div class="col-sm-3">
			
			<h2>Admin Panel</h2>
			<ul id="Side_Menu" class="nav nav-pills nav-stacked">
				<li class="active">
				<a href="admin.php">
				<span class="glyphicon glyphicon-th"></span>
				&nbsp;Nadzorna ploča</a></li>
				<li><a href="postsearch.php">
				<span class="glyphicon glyphicon-list-alt"></span>
				&nbsp;Objave</a></li>
				<li><a href="blog.php">
				<span class="glyphicon glyphicon-list-alt"></span>
				&nbsp;Blog Post</a></li>
				<li><a href="categories.php">
				<span class="glyphicon glyphicon-tags"></span>
				&nbsp;Kategorije</a></li>
				<li><a href="users.php">
				<span class="glyphicon glyphicon-user"></span>
				&nbsp;Upravljenje korisnicima</a></li>
				<li><a href="Blog.php?Page=1" target="_Blank">
				<span class="glyphicon glyphicon-equalizer"></span>
				&nbsp;Sider</a></li>
				<li><a href="Logout.php">
				<span class="glyphicon glyphicon-log-out"></span>
				&nbsp;Logout</a></li>	
		
			</ul>
			
		</div> <!--siderbar Nav-->

			<div class="col-sm-9" >
				<div class="main">
			<h1>Izbrisati blog Post </h1>	
			 <?php echo ZelenaPoruka();?>
			  <?php echo CrvenaPoruka();?>
		<?php
	$SerachQueryParameter=$_GET['Edit'];

	$Query="SELECT * FROM blog WHERE id='$SerachQueryParameter'";
	$ExecuteQuery=mysqli_query($conn,$Query);
	while($DataRows=mysqli_fetch_array($ExecuteQuery)){
		$TitleToBeUpdated=$DataRows['title'];
		$CategoryToBeUpdated=$DataRows['category'];
		$ImageToBeUpdated=$DataRows['image'];
		$PostToBeUpdated=$DataRows['post'];
		
	}
	
	
	?>
<form action="edit.php?Edit=<?php echo $SerachQueryParameter; ?>" method="post" enctype="multipart/form-data">
	<fieldset>
	<div class="form-group">
	<label for="title"><span class="FieldInfo">Title:</span></label>
	<input value="<?php echo $TitleToBeUpdated; ?>" class="form-control" type="text" name="Title" id="title" placeholder="Title">
	</div>
	<div class="form-group">
	<span class="FieldInfo"> Existing Category: </span>
	<?php echo $CategoryToBeUpdated;?>
	<br>
	<label for="categoryselect"><span class="FieldInfo">Category:</span></label>
	<select class="form-control" id="categoryselect" name="Category" >
	<?php

$ViewQuery="SELECT * FROM kategorije ORDER BY datetime desc";
$Execute=mysqli_query($conn,$ViewQuery);
while($DataRows=mysqli_fetch_array($Execute)){
	$Id=$DataRows["id"];
	$CategoryName=$DataRows["name"];
?>	
	<option><?php echo $CategoryName; ?></option>
	<?php } ?>
			
	</select>
	</div>
	<div class="form-group">
		<span class="FieldInfo"> Existing Image: </span>
	<img src="images/<?php echo $ImageToBeUpdated;?>" width=170px; height=70px;>
	<br>
	<label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
	<input type="File" class="form-control" name="Image" id="imageselect">
	</div>
	<div class="form-group">
	<label for="postarea"><span class="FieldInfo">Post:</span></label>
	<textarea class="form-control" name="Post" id="postarea">
		<?php echo $PostToBeUpdated; ?>
	</textarea>
	<br>
<input class="btn btn-success btn-block" type="Submit" name="Submit" value="Update Post">
	</fieldset>
	<br>
</form>
</div>




	</div> <!-- Ending of Main Area-->
	
</div> <!-- Ending of Row-->
	
</div> <!-- Ending of Container-->
</div>
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
				<li><a href="http://www.bildit.ba" target="_blank">BILD-IT </a></li>
				<li><a href="../../../../pages/main/materijali.php">Dodatni materijali</a></li>
				<li><a href="http://www.bildbosnia.org/forum" target="_blank">Online forum</a></li>
				<li><a href="https://www.facebook.com/openbosna/" target="_blank">Facebook</a></li>
				<li><a href="http://bildbosnia.org" target="_blank">BILD</a></li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>


</body>
</html>