<?php include 'includes/connect.php';?>
<?php require_once("includes/poruka.php"); ?>
	 


<?php
function Redirect_to($new_Location){
	header("Location:".$new_Location);
	exit;
}


?>
