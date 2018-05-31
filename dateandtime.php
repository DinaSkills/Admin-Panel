<?php
date_default_timezone_set("Europe/Sarajevo");
$CurrentTime=time();
$DateTime=strftime("%d-%m-%Y %H:%M:%S",$CurrentTime);
echo $DateTime;
?>