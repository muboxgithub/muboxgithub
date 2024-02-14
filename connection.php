<?php

$dbhost="localhost";

$dbname="donation";
$dbpassword="";
$dbusername="root";


$conn=mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname);

if(!$conn)
{
    echo "disconencted";
}
?>