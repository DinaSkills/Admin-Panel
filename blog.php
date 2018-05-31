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

if($Title =='' OR $Category =='' OR $Post =='' OR $Image =='' ){
		
	       $_SESSION["Crvena"]="Polja moraju biti sva ispunjena";
			Redirect_to("blog.php");	
				exit();
	
}
else{

	$Query="INSERT INTO blog (datetime,title,category,author,image,post)
	VALUES('$DateTime','$Title','$Category','$Admin','$Image','$Post')";
	$Execute=mysqli_query($conn,$Query);
	move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
	if($Execute){
	$_SESSION["Zelena"]="Post Added Successfully";
	Redirect_to("blog.php");
	}else{
	$_SESSION["Crvena"]="Something Went Wrong. Try Again !";
	Redirect_to("blog.php");
		
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
		<title>Blog</title>

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
				<li>
				<a href="admin.php">
				<span class="glyphicon glyphicon-th"></span>
				&nbsp;Nadzorna ploča</a></li>
				<li><a href="postsearch.php">
				<span class="glyphicon glyphicon-list-alt"></span>
				&nbsp;Search</a></li>
				<li class = "active"><a href="blog.php">
				<span class="glyphicon glyphicon-list-alt"></span>
				&nbsp;Blog Post</a></li>
				<li><a href="categories.php">
				<span class="glyphicon glyphicon-tags"></span>
				&nbsp;Kategorije</a></li>
				<!--<li><a href="users.php">
				<span class="glyphicon glyphicon-user"></span>
				&nbsp;Upravljenje korisnicima</a></li>-->
				<li><a href="Blog.php?Page=1" target="_Blank">
				<span class="glyphicon glyphicon-equalizer"></span>
				&nbsp;Sider</a></li>
				<!--<li><a href="Logout.php">
				<span class="glyphicon glyphicon-log-out"></span>
				&nbsp;Logout</a></li>-->
		
			</ul>
	</div> <!--col-3-->

	<div class="col-sm-9" >
			<div class="main">
				
			 <?php echo ZelenaPoruka();?>
			  <?php echo CrvenaPoruka();?>
			<h1> Blog </h1>			      
		    <form action="blog.php" method="post" enctype="multipart/form-data">
	        <fieldset>
	    <div class="form-group">
				<label for="naslov">Ime destinacije:</label>
				<input class="form-control" type="text"  name="naslov" id ="naslov" placeholder="Naslov" size="100"/>
		</div>
		

	    <div class="form-group">
	         <label for="categoryselect"><span class="FieldInfo">Category:</span></label>
	
	    <select class="form-control" id="categoryselect" name="category"> 
				<?php 

							$result_query = "SELECT * FROM kategorije";
							
							$run_result = mysqli_query($conn,$result_query);
						    

							while($row_result = mysqli_fetch_array($run_result)){
								
								$id=$row_result['id'];
								
								$ime=$row_result['ime'];	
						?>
							 <option><?php echo $ime;?></option>
							<?php }	?>
							
							</select>
							</div>
              <div class="form-group">
								
	   </select>
	</div>
	         <div class="form-group">
	         <label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
	         <input type="File" class="form-control" name="Image" id="imageselect">
	         </div>
	          <div class="form-group">
	         <label for="postarea"><span class="FieldInfo">Post:</span></label>
	         <textarea class="form-control" name="Post" id="postarea"></textarea>
			  <br>
			  <br>
			  <br>
             <input class="btn btn-success btn-block" type="Submit" name="Submit" value="Add New Post">
	</fieldset>
	<br>
</form>
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