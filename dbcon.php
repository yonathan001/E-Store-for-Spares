<?php


 $host ="localhost";
 $username="root";
 $password="";
 $dbname="yospare";

 $dbcon=mysqli_connect($host,$username,$password, $dbname);
 if($dbcon){

    echo "Connected !";
 }  else{

    echo "unable to connect";
 }




?>

