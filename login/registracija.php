
<!DOCTYPE>

<html>
	<head>
		<title>Form Validation Project</title>
			<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- google font-->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<!-- ekko-lightbox -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.css">
		<!-- main css -->
		<link rel="stylesheet" href="style.css">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>

	<body>
		<?php
$NameError="";
$EmailError="";

if(isset($_POST['Submit'])){
	
 if(empty($_POST["Name"])){
$NameError="Ime je potrebno.";
 }
	 else{
	$Name=Test_User_Input($_POST["Name"]);
if(!preg_match("/^[A-Za-z\. ]*$/",$Name)){
$NameError="Only Letters and white sapace are allowed";
}
}

if(empty($_POST["Email"])){
$EmailError="Email je potreban.";
 }
	 else{
	$Email=Test_User_Input($_POST["Email"]);
  if(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$Email))
{
$EmailError="Invalid Email Format";
}
}

if(!empty($_POST["Name"])&&!empty($_POST["Email"])&&!empty($_POST["Gender"])&&!empty($_POST["Website"])){
if((preg_match("/^[A-Za-z\. ]*$/",$Name)==true)&&(preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$Email)==true)&&(preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/",$Website)==true))
{

}
function Test_User_Input($Data){
	return $Data;
}
?>
<h2>Form Validation with PHP.</h2>

<div class="container-fluid">
      <div class=row>
      
        <form  action="registracija.php" method="post"> 
<legend>* Please Fill Out the following Fields.</legend>			
<fieldset>
Name:<br>
<input class="input" type="text" Name="Name" value="">
<span class="Error">*<?php echo $NameError;  ?></span><br>	 
E-mail:<br>
<input class="input" type="text" Name="Email" value="">
<span class="Error">*<?php echo $EmailError;  ?></span><br>
            
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="Submit">Sign in</button>
      </form>
  </div>
    </div> <!-- /container -->




	    
	</body>
</html>