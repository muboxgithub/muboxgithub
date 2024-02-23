<?php

session_start();
include('connection.php');



$name=trim($_POST['name']);


$email=trim($_POST['email']);

$address=trim($_POST['address']);

$phone=trim($_POST['phone']);



//lets do a conditon

$sqlfirst="SELECT * FROM `doners` WHERE `email`='$email'";

$res=$conn->query($sqlfirst);


if($res->num_rows > 0)

{
    $row=$res->fetch_assoc();
    $id=$row['id'];
    echo "<script> exisitingid= $id</script>";

    echo "Data Alearady exist";
  
   


}

else{

$sql="INSERT INTO `doners` (`fullname`,`email`,`phone`,`address`) VALUES ('$name','$email','$phone','$address')";

$result=$conn->query($sql);


if($result=== true){
    $newId=$conn->insert_id;
    //$_SESSION['newId']=$newId;
   echo "<script> newid=$newId </script>";

    echo "data submited successfluly";
}
else{
    echo "Erorr".$sql."<br>".$conn->error;
}
}

$conn->close();













?>
