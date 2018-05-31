<?php 	include 'includes/connect.php';
     	require_once("includes/poruka.php");   
   		require_once("includes/function.php");    
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
         <link rel="stylesheet" href="../admin/css/adminstyles.css">
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
       
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
<body>

<div class ="container-fluid">
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
			
			    <h2>ADMIN PANEL</h2>
			        <ul id="Side_Menu" class="nav nav-stacked">
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
				        <!--<li><a href="users.php">
				            <span class="glyphicon glyphicon-user"></span>
				            &nbsp;Upravljenje korisnicima</a></li>-->
				        <li><a href="Blog.php?Page=1" target="_Blank">
				            <span class="glyphicon glyphicon-equalizer"></span>
				            &nbsp;Galerija</a></li>
				       <!-- <li><a href="Logout.php">
				            <span class="glyphicon glyphicon-log-out"></span>
				            &nbsp;Logout</a></li>-->
		
			        </ul>
		</div> <!--col-sm-2-->

        <div class="col-sm-9">
			
	        <div class="main">
			      <h1>Blog Objave</h1>	
	            <div> <?php echo ZelenaPoruka();?>
			          <?php echo CrvenaPoruka();?>
                    </div>
	
                <div class="table-responsive">
	                <table class="table">
		                     <tr >
								 <th>No</th>
			                     <th>Naslov</th>
								  <th>Vrijeme i Datum</th>
								  <th>Ime</th>
			                     <th>Kategorija</th>
			                    <th>Banner</th>	
			                     <th>Uredi</th>
			                </tr>			      
                            <?php

                            $ViewQuery="SELECT * FROM blog ORDER BY id desc;";
                            $Execute=mysqli_query($conn,$ViewQuery);
                            $SrNo=0;
                            while($DataRows=mysqli_fetch_array($Execute)){
	                        $Id=$DataRows["id"];
	                        $DateTime=$DataRows["datetime"];
	                        $Title=$DataRows["title"];
	                        $Category=$DataRows["category"];
	                        $Admin=$DataRows["author"];
	                        $Image=$DataRows["image"];
	                        $Post=$DataRows["post"];
	                        $SrNo++;
	                        ?>
                            <tr>	
	                        <td ><?php echo $SrNo; ?></td>
	                    <td style="color: #5e5eff;">
							<?php
	                        if(strlen($Title)>19){$Title=substr($Title,0,19).'..';}
	                         echo $Title;
							 ?>
							 </td>
	                        <td ><?php
	                        if(strlen($DateTime)>12){$DateTime=substr($DateTime,0,16);}
	                        echo $DateTime;
	                         ?></td>
	                        <td ><?php
	                        if(strlen($Admin)>9){$Admin=substr($Admin,0,17);}
	                        echo $Admin; ?></td>
	                        <td ><?php
	                        if(strlen($Category)>10){$Category=substr($Category,0,10);}
	                        echo $Category;
	                        ?></td>
	                       <td ><img class ="img-responsive" src="images/<?php echo $Image; ?>"width="80px"; height="50px"></td>
	                      
                            <td >
                            <a href="edit.php?Edit=<?php echo $Id; ?>">
	                        <span class="btn btn-warning">Edit</span>
	                        </a>
                            <a href="deleteblog.php?Delete=<?php echo $Id; ?>">
	                        <span class="btn btn-danger">Delete</span>
                           </a></td>
	                        </tr>
	                       <?php } ?>
					 </table>
				</div>		
             </div> <!-- Ending of Main Area-->
	
         </div> <!-- Ending of Row-->
	
            
	 </div>
	
</div> 
<div  class="footer container-fluid">
            <div class="container-fluid">
               <span class="text-muted">Place sticky footer content here.</span>
            </div>
</div>
</body>
</html>