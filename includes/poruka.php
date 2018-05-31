<?php
session_start();
function CrvenaPoruka(){
    if(isset($_SESSION["Crvena"])){
       $Output="<div class=\"alert alert-danger\">" ;
       $Output.=htmlentities($_SESSION["Crvena"]);
       $Output.="</div>";
       $_SESSION["Crvena"]=null;
       return $Output;
        
        
    }
}
function ZelenaPoruka(){
    if(isset($_SESSION["Zelena"])){
       $Output="<div class=\"alert alert-success\">" ;
       $Output.=htmlentities($_SESSION["Zelena"]);
       $Output.="</div>";
       $_SESSION["Zelena"]=null;
       return $Output;
       
        
        
    }
}



?>