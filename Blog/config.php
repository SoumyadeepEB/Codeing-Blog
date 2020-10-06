<?php
    $server="localhost";
    $username="root";
    $password="";
    $dbname="portal";

    $link=mysqli_connect($server,$username,$password,$dbname) 
    or die("Connection Error".mysqli_connect_error());
?>