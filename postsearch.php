
<?php 	include 'includes/connect.php';
     	require_once("includes/poruka.php");   
   		require_once("includes/function.php");    

	
		if(isset($_POST['submit'])){
	     $site_category=mysqli_real_escape_string($conn,$_POST["category"]);
		 $site_title = $_POST['site_title'];
		 $site_link = $_POST['site_link'];
		 $site_keywords = $_POST['site_keywords'];
		 $site_desc = $_POST['site_desc'];
		 $site_image = $_FILES['site_image']['name'];
		 $site_image_tmp = $_FILES['site_image']['tmp_name'];
	
		
		if($site_title =='' OR $site_link =='' OR $site_keywords =='' OR $site_desc ==''){
		
		echo "<script>alert('please fill all the fields!')</script>";
		
		exit();
		}
		
		else {
		
		$insert_query= "INSERT INTO sites (site_title,site_link,site_keywords,site_desc,site_image,category) values ('$site_title','$site_link','$site_keywords','$site_desc','$site_image','$site_category')";
 
     move_uploaded_file($site_image_tmp,"images/{$site_image}");

		
		if(mysqli_query($conn,$insert_query)){
		
		echo "<script>alert('Data inserted into table')</script>";
		
		
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
		<title>Search</title>

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

		
		<!--za DatePicker -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		  <link rel="stylesheet" href="/resources/demos/style.css">
		  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
		
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
		
			<h1>Admin Panel</h1>

			<?php echo ZelenaPoruka();?>
			  <?php echo CrvenaPoruka();?>
			<ul id="Side_Menu" class="nav nav-pills nav-stacked">
				<li >
				<a href="admin.php">
				<span class="glyphicon glyphicon-th"></span>
				&nbsp;Nadzorna ploča</a></li>
				<li class="active"><a href="postsearch.php">
				<span class="glyphicon glyphicon-list-alt"></span>
				&nbsp;Search</a></li>
				<li><a href="blog.php">
				<span class="glyphicon glyphicon-list-alt"></span>
				&nbsp;Blog Post</a></li>
				<li ><a href="categories.php">
				<span class="glyphicon glyphicon-tags"></span>
				&nbsp;Kategorije</a></li>
				<!--<li><a href="users.php">
				<span class="glyphicon glyphicon-user"></s-->
				<li><a href="Blog.php?Page=1" target="_Blank">
				<span class="glyphicon glyphicon-equalizer"></span>
				&nbsp;Galerija</a></li>
				<!--<li><a href="Logout.php">
				<span class="glyphicon glyphicon-log-out"></span>
				&nbsp;Logout</a></li>-->	
		
			</ul>
           
		</div> <!--siderbar Nav-->


			<div class="col-sm-9">
			  <h1>Dodaj novu objavu</h1>
			  <div class= "main">
		
			<form action="postsearch.php" method="post" enctype="multipart/form-data">
			<fieldset>
				 <div class="form-group">
				<label for="destinacija">Ime destinacije:</label>
				<input class="form-control" type="text"  name="site_title" id ="destinacija" placeholder="Ime Destinacije" size="100"/>
			</div>
			<div class="form-group">
				<label for="naslov">Naslov:</label>
				<input class="form-control" type="text"  name="site_link" id ="naslov" placeholder="Naslov" size="100"/>
			</div>	
			<div class="form-group">
				<label for="opis">Kljucne rijeci</label>
				<input class="form-control" type="text"  name="site_keywords" id ="opis" placeholder="opis" size="100"/>
			</div>
			<div class="form-group">
				<label for="postarea">Opis Aražmana:</label>
				<textarea class="form-control" type="text"  name="site_desc" id ="postarea" placeholder="post" size="100"></textarea>
			</div>	
				

			 <div class="form-group">
				<label for="categoryselect"><span class="FieldInfo"></span></label>
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
	<label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
	<input type="File" class="form-control" name="site_image" id="imageselect">
	</div>
			    <input class="btn btn-info btm-block" type="submit" name="submit" value="Dodaj novu objavu"/>
			</fieldset>
			 <br>
				</form>
		</div><!-- main-->
      </div><!-- col-9-->


			
</div> <!-- end row-->
</div><!--container-->
     
    </div> <!-- end row-->

    
	<div  class="footer container-fluid">
            <div class="container-fluid">
               <span class="text-muted">Place sticky footer content here.</span>
            </div>
	</div>
</body>
</html>