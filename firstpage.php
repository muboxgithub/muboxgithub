<?php


include('connection.php');


$sql="SELECT * FROM applicants ORDER BY time ASC";


$result=$conn->query($sql);







?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seletion domain site</title>
 <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
  
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<style>



    .body{
        background-color: #f8f8f8;
    }
    #we
    {
        background-color: #ffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .gen{
margin-top:5px;
padding:5px;
margin-bottom:10px;
    }
 


   .selectedroo td{
  background-color: #ffeeba; /* Change the color as desired */
}
  
</style>
</head>
<body>


    <div class="container mt-3">
   
    <div class="row">


    <div class="col">
    <div class="form-group">
    <select id="gender" class="form-control">
<option value="">Select by gender</option>
<option value="male">Male</option>
<option value="female">Female</option>


    </select>

</div>
</div>



<div class="col">
<div class="form-group">

    <select id="region" class="form-control">
        <option value="">Select by Region</option>
        <option value="addisabeba">A.A</option>
        <option value="amahra">Amhara</option>
        <option value="Tigraie">Tigraie</option>
        <option value="oromoia">Oromoia</option>
        <option value="afar">Afar</option>
        <option value="somalia">Somale</option>
        <option value="other">Other</option>

</select>

</div>
</div>


<div class="col">
<div class="form-group">
<select id="grade" class="form-control">
    <option value="">Select by grade</option>
    <option value="12">G12</option>
    <option value="11">G11</option>
    <option value="10">G10</option>
    <option value="9">G9</option>
    <option value="8">G8</option>
</select>

</div>
</div>

</div>

<button id="randomselect" class="btn btn-info">Selected Random 10</button>




<div class="container mt-2 mb-1 bg-white text-center text-info">
<p id="selectedcount"></p>
</div>
<table id="example" class="display" style="width:100%">
    


    <thead>

   
        <tr>

        





            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Grade </th>
            <th>School</th>
            <th>Gender</th>
            <th>Region</th>
            <th>Zone</th>
            <th>City</th>
        </tr>
    </thead>  
    <tbody>
    <?php

if($result->num_rows >0){

    while($row=$result->fetch_assoc()){
    

    ?>
            <tr>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php  echo $row['email'] ?></td>
            <td><?php  echo $row['phone'] ?></td>

            <td><?php   echo $row['grade']  ?></td>
            <td><?php  echo $row['school'] ?></td>
            <td><?php  echo $row['gender'] ?></td>
            <td><?php  echo $row['region'] ?></td>
            <td><?php  echo $row['zone'] ?></td>
            <td><?php    echo $row['city'] ?></td>



            </tr>
       

        <?php

}

}
?>
    </tbody>
    <tfoot>
        <tr>
        <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Grade </th>
            <th>School</th>
            <th>Gender</th>
            <th>Region</th>
            <th>Zone</th>
            <th>City</th>
        </tr>
    </tfoot>
</table>

</div>
    <script type="text/javascript">
        new DataTable('#example');
$(document).ready(function(){
$("#example").DataTable();
});



$(document).ready(function()
{


    //to select by gender

            var table= $('#example').DataTable();
            var SelectedRow = [];

            $('#gender').on('change',function()
            {

            var selectgender=$(this).val();
            table.column(6).search(selectgender).draw();
            });


//slection for region
            $('#region').on('change',function()
            {

            var reg=$(this).val();


            table.column(7).search(reg).draw();

            });

            //for selection buy grade 

            $('#grade').on('change',function()
            {

            var grade=$(this).val();

            table.column(4).search(grade).draw();
            });




            //for changing color when selcted row

            $('#example tbody').on('click', 'tr', function() {
    $(this).toggleClass('selectedroo');
    var datarow = table.row(this).data();
    var rowindex = table.row(this).index();

    if (SelectedRow.includes(rowindex)) {
      var index = SelectedRow.indexOf(rowindex);
      SelectedRow.splice(index, 1);
    } else {
      SelectedRow.push(rowindex);
    }

    $('#selectedcount').text('Total Selected: ' + SelectedRow.length);

    if ($(this).hasClass('selectedroo')) {
      // Perform actions with selected row
    } else {
      // Perform actions with deselected row
    }
  });

            


  $('#randomselect').on('click',function()
  {

table.$('tr.selectedroo').removeClass('selectedroo');



var visiblerow=table.rows({ search: 'applied', page: 'current' }).nodes();


var SelectedRow=$(visiblerow).slice(0,2);

$(SelectedRow).addClass('selectedroo');

var SelectedCou=$(table.rows('.selectedroo').nodes()).length;


$('#selectedcount').text('Total number of Random Selected:' + SelectedCou)

  });

 
            });





    </script>
</div>
</body>

</html>