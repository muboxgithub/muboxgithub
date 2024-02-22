<?php

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
    
    $update="UPDATE `doners` SET `fullname`='$name', `phone`='$phone' ,`address`='$address'  WHERE `email`='$email'";


    $result=$conn->query($update);

    if($result=== true){
        echo "data updated successfully";
        echo "<script>
        
        documnet.getElementById('modal2').style.display='block';
        </script>"; // Display the alert box using JavaScript
    }
    else{
        echo "Error".$update."<br>".$conn->error;
    }



}

else{

$sql="INSERT INTO `doners` (`fullname`,`email`,`phone`,`address`) VALUES ('$name','$email','$phone','$address')";

$result=$conn->query($sql);


if($result=== true){
    echo "data submited successfluly";
}
else{
    echo "Erorr".$sql."<br>".$conn->error;
}
}

$conn->close();













?>

<html>


<head>

<title></title>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
 
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

</head>

<body>
<div class="modal" id="modal2">
<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header">

<h4 class="modal-title">Alert</h4>
</div>

<div class="modal-body">
<p>Do you want to update your data</p>

</div>


<div class="modal-fotter">


</div>


</div>
</div>


</div>

</body>
</html>
