<?php


include('connection.php');

$name=trim($_POST['name']);

$email=trim($_POST['email']);


$address=trim($_POST['address']);

$phone=trim($_POST['phone']);

$firstsql="SELECT * FROM `doners` WHERE `email`='$email'";


$res=$conn->query($firstsql);


if($res->num_rows >0){
$sql="UPDATE `doners` SET `fullname`='$name',`phone`='$phone',`address`='$address' WHERE `email`='$email'";


$result=$conn->query($sql);

if($result=== True){
    echo "Data Updated Successfully";
}
else{

    echo "Error".$sql."<br>".$conn->error;
}





}
$conn->close();


?>
