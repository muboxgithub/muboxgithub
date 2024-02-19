
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
  <title>Select student for domain</title>
 <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
 
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<style>


@media screen and (min-width:992px){
  .row{
  width:800px;
  white-space: nowrap;
  
}
}









  @media screen and (max-width:768px)

  {
   
.responsive-table{
 overflow-x:auto;
  white-space:nowrap;
  display:block;
}
.responsive-table td,
.responsive-table th
{
  display:inline-block;
  vertical-align:top;
  min-width: 200px;

}


.responsive-table td::before,
.responsive-table th::before {
  content:attr(data-table);
  font-weight:bold;
  margin-bottom:0.5em;

}

.form-select{
  width:100px;
  white-space: nowrap;
  
}
}

body
{
   /* overflow:hidden;*/
}
.form-group{
 // margin-right:10px;
}

    body{
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
  .text-right
  {
    //text-align:right;
  }

  select option:hover

  {
    background-color:#9932cc;
    border-color: #ced4da;
  }
  #rr{
box-shadow:0 0 4px rgba(0,0,0,0.2);
background-color:white;
  }
  .sea:active{
   
  }
</style>
</head>
<body>


    <div  id="rr" class="container mt-3">
   
    <div class="row">

   

    <div class="col  mt-3">
    <div class="form-group">
    <select id="gender" class="form-select">
<option value="">Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>


    </select>

</div>
</div>



<div class="col  mt-3">
<div class="form-group">

    <select id="firstselector" class="form-select">
        <option value="">Region</option>
        <option value="AddisAbaba">A.A</option>
        <option value="Afar">Afar</option>
        <option value="Amhara">Amhara</option>
        <option value="BenishangulGumuz">Benishangul-Gumuz</option>
        <option value="CentralEthiopia">Central-Ethiopia</option>
        <option value="DireDawa">Dire Dawa</option>
        <option value="Gambela">Gambela</option>
        <option value="Harari">Harari</option>
        <option value="Oromia">Oromia</option>
        <option value="Sidama">Sidama</option>
        <option value="Somali">Somali</option>
        <option value="SouthEthiopia"> SouthEthiopia</option>
        <option value="SouthwestEthiopia">South west Ethiopia</option>
        <option value="Tigray">Tigray</option>


       

</select>

</div>
</div>


<div class="col  mt-3">
<div class="form-group">
<select id="secondselctor" class="form-select">
    <option value="">Zone</option>
   
</select>

</div>
</div>




<div class="col  mt-3">
    <div class="form-group">
      <form>
      

  <input type="text" name="search" class="form-control" id="serchschool" placeholder="School Search">
</form>
    </select>

</div>
</div>


</div>

<div  class="container align-left mt-2">
    

<div class="d-flex mt-1">

<div class="pl-3">
  <form>
<input id="userinput" type="input" class="form-control" placeholder="Input numbers">
</form>
</div>


</div>


</div>





<div class="container mt-2 mb-1 bg-white text-center text-info">
<p id="selectedcount"></p>
</div>


<div class="container mt-2 text-success text-center">
<p id="Totalsum"></p>
</div>
<table id="example" class="responsive-table" style="width:100%;">
    


    <thead>

   
        <tr>

        





            <th data-table="Name">Name</th>
          
            <th data-table="Email">Email</th>
            <th data-table="Phone">Phone</th>
            <th data-table="Grade">Grade </th>          
            <th data-table="School">School</th>
            <th data-table="Gender">Gender</th>
            <th data-table="Region">Region</th>
            <th data-table="Zone">Zone</th>
            <th data-table="City">City</th>
        </tr>
    </thead>  
    <tbody>
    <?php

if($result->num_rows >0){

    while($row=$result->fetch_assoc()){
    

    ?>
            <tr>
            <td><?php echo $row['fullname'] ?></td>
        
            <td><?php  echo $row['email'] ?></td>
            <td><?php  echo $row['phone'] ?></td>

            <td><?php   echo $row['grade']  ?></td>

            <?php


$cost=$row['grade'];
if($row['grade']== 'G12')
{
$cost=10;
}
else if($row['grade']== 'G11'){
$cost =11;
}

else if($row['grade']== 'G10'){
$cost=30;
}


else{
    $cost =45;
}
?>

            


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
    
</table>

<div class="container mt-1 text-right">
    
    <button type="button" id="submitbutton" class="btn btn-success" style="background-color:#9932cc;">Submit</button>


</div>

<div class="modal" id="Mymodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Notification</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="container border mb-3">
          <p id="summerytext"></p>
        </div>
        <form >
          <div class="form-group mt-2">
            <label for="inputName"><span style="color:#9932cc;font-size:20px;"><i class="fa fa-user"></i>&nbsp;</span>User Name</label>
            <input type="text" placeholder="Enter your name" name="username" class="form-control mt-2" id="username" required>
          </div>
          <div class="form-group mt-2">
            <label for="inputName"><span style="color:#9932cc;font-size:20px;"><i class="fa fa-envelope"></i>&nbsp;</span>Email</label>
            <input type="email" id="emailvalid" name="email" placeholder="Enter your email" class="form-control mt-2">
          </div>
          <div class="form-group mt-2">
            <label for="inputName"><span style="color:#9932cc;font-size:20px;"><i class="fa fa-address-card-o"></i>&nbsp;</span>Address</label>
            <input type="text" placeholder="Enter your address" name="address" class="form-control">
          </div>
          <div class="form-group mt-2">
            <label for="inputName"><span style="color:#9932cc;font-size:20px;"><i class="fa fa-phone"></i>&nbsp;</span>Phone</label>
            <input type="number" id="phonecount" name="phone" placeholder="Enter your phone number" class="form-control">
          </div>
          <div class="form-group mt-3 mb-3">
            <button id="submitid" onclick="oncha()" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="secondmodal" style="display:none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Choice Payment opiton</h4>
        <button type="button" class="btn-close" aria-label="Close" onclick="closemodel()" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>safasjhernt5yh</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>








</div>







    <script type="text/javascript">
        new DataTable('#example');
$(document).ready(function(){
$("#example").DataTable();
});




function oncha(){


  document.getElementById('Mymodal').style.display='none';
  document.getElementById('secondmodal').style.display='block';
}


function closemodel()
{
  document.getElementById('secondmodal').style.display='none';
  document.getElementById('Mymodal').style.display='block';
}


$(document).ready(function()
{
 


    //to select by gender

            var table= $('#example').DataTable();
            var selectedCount = 0; 
            var selectedRows = [];
            var totalCost=0;
     
            
            $('#gender').on('change',function()
            {

            var selectgender=$(this).val();

            if(selectgender === 'Male'){
                table.column(5).search('^' + selectgender + '$',true,false).draw();

            }
            else{
                table.column(5).search(selectgender).draw();
            }
           
            });



            //slect by shool

            $('#school').on('change',function(){
   var school=$(this).val();


   table.column(4).search(school).draw();


            });

//slection for region
            $('#firstselector').on('change',function()
            {

            var reg=$(this).val();


            table.column(6).search(reg).draw();

            });

            //for selection buy grade 

            $('#secondselctor').on('change',function()
            {

            var grade=$(this).val();

            table.column(7).search(grade).draw();
            });




            //for changing color when selcted row

      


  $('#userinput').on('input',function(){


    table.$('tr.selectedroo').removeClass('selectedroo');


    var userInput= parseInt($('#userinput').val());


    var visiblerow=table.rows({search:'applied', page:'current'}).nodes();

selectedRows=$(visiblerow).slice(0,userInput);

$(selectedRows).addClass('selectedroo');

selectedCount = selectedRows.length;

$('#selectedcount').text('Total numeber of selected count is:'+ selectedCount);


var totalCost=0;
var fixedcost=500;

$(selectedRows).each(function(){




totalCost +=fixedcost;
});

$('#Totalsum').text('Total amount of random select cost is: ' + totalCost);



  });
  


  $('#example tbody').on('click', 'tr', function() {
    $(this).toggleClass('selectedroo');
    //var datarow = table.row(this).data();
    var rowindex = table.row(this).index();

    

var index=-1;
for(var i=0; i< selectedRows.length; i++){
if(selectedRows[i]===rowindex){

  index=i;
  break;
}
}

if(index !== -1){
  selectedRows.splice(index,1);
  $(this).removeClass('selectedroo');
}
else{
  selectedRows.push(rowindex);
}




   

selectedCount = selectedRows.length; //to updare the selected count
    $('#selectedcount').text('Total Selected: ' + selectedCount );




var totalCost = 0;

for (var i= 0;  i < selectedRows.length; i++)
{
    var rowIndex=selectedRows[i];

    var rowData=table.row(rowIndex).data();

    var cost=500;


    totalCost += cost;
}

$('#Totalsum').text('TotalSelectedCost is:' + totalCost);


    if ($(this).hasClass('selectedroo')) {
      // Perform actions with selected row
    } else {
      // Perform actions with deselected row
    }
  });

$('#submitbutton').on('click',function(){
  selectedCount =selectedRows.length;

var totalCost=0;

for(var i= 0; i < selectedRows.length; i++){


var rowIndex=selectedRows[i];

var rowData=table.row(rowIndex).data();

var cost=500;

totalCost += cost;

}

var summeryText= 'Total Number of Selected: ' + SelectedCount +'&nbsp; Student' +'<br> Total cost is: ' + totalCost + 'Birr';

document.getElementById('summerytext').innerHTML=summeryText;


var modal=new bootstrap.Modal(document.getElementById('Mymodal'));


modal.show();


modal._element.addEventListener('hidden.bs.modal',function()
{

  $('.modal-backdrop').remove();
});

});




  $('#submitbutton').on('click',function(){


    var SelectedCount=$(table.rows('.selectedroo').nodes()).length;


    var totalCost=SelectedCount *500;

    var SelectedRow=table.rows('.selectedroo').data().toArray();




    var summeryText= 'Total Number of Selected: ' + SelectedCount +'&nbsp; Student' +'<br> Total cost is: &nbsp;' + totalCost + 'Birr';

document.getElementById('summerytext').innerHTML=summeryText;


var modal=new bootstrap.Modal(document.getElementById('Mymodal'));


if(totalCost > 0){
modal.show();
}


modal._element.addEventListener('hidden.bs.modal',function(){


  $('.modal-backdrop').remove();
});

  });
/*

  $('#randomselect').on('click',function()
  {

table.$('tr.selectedroo').removeClass('selectedroo');



var visiblerow=table.rows({ search: 'applied', page: 'current' }).nodes();


var SelectedRow=$(visiblerow).slice(0,10);

$(SelectedRow).addClass('selectedroo');

var SelectedCou=$(table.rows('.selectedroo').nodes()).length;


$('#selectedcount').text('Total number of Random Selected:' + SelectedCou)

  });
*/

//for creating second modal


 

$('#serchschool').on('keyup',function(){


var serchin=$(this).val();


table.column(4).search(serchin).draw();

});

            });
         

            const options = {
              AddisAbaba: [],
    Afar: ["Awsi Rasu", "Kilbet Rasu", "Gabi Rasu", "Fanti Rasu", "Hari Rasu", "Mahi Rasu (New Zone)", "Argobba (special woreda)"],
    Amhara: ["Agew Awi", "East Gojjam", "North Gondar", "Central Gondar", "West Gondar", "Wag Hemra", "West Gojjam", "Bahir Dar (special zone)", "West Gojjam", "South Gondar", "North Wollo", "South Wollo", "Oromia", "North Shewa"],
    BenishangulGumuz: ["Asosa", "Kamashi", "Metekel"],
    CentralEthiopia: ["East Gurage Zone", "Gurage Zone", "Halaba Zone", "Hadiya Zone", "Kebena Special Woreda", "Kembata Zone", "Mareko Special Woreda", "Silt'e Zone", "Tembaro Special Woreda", "Yem Zone"],
    DireDawa: [],
    Gambela: ["Anywaa", "Majang", "Nuer"],
    Harari: ["Amir-Nur Woreda", "Abadir Woreda", "Shenkor Woreda", "Jin'Eala Woreda", "Aboker Woreda", "Hakim Woreda", "Sofi Woreda", "Erer Woreda", "Dire-Teyara Woreda"],
    Oromia: ["East Arsi", "West Arsi", "East Bale", "West Bale", "Borana", "East Hararghe", "East Shewa", "East Welega", "East Guji", "West Guji", "Horo Guduru Welega", "Illubabor", "Buno Bedele", "Jimma", "Kelam Welega", "North Shewa", "Southwest Shewa", "West Haraghe", "West Shewa", "West Welega", "Oromia Special Zone Surrounding Finfinne"],
    Sidama: ["Central Sidama Zone", "Eastern Sidama Zone", "Northern Sidama Zone", "Southern Sidama Zone"],
    Somali: ["Sitti Zone", "Fafan Zone", "Jarar Zone", "Erer Zone", "Nogob Zone", "Dollo Zone", "Korahe Zone", "Shabelle Zone", "Afder Zone", "Liben Zone", "Dhawa Zone", "Jigjiga Special Zone", "Tog Wajale Special Zone", "Degehabur Special Zone", "Gode Special Zone", "Kebri Beyah Special Zone", "Kebri Dahar Special Zone"],
    SouthEthiopia: ["Ale Zone", "Amaro Zone", "Ari Zone", "Basketo Zone", "Burji Zone", "Dirashe Zone", "Gamo Zone", "Gedeo Zone", "Gofa Zone", "Konso Zone", "South Omo Zone", "Wolayita Zone"],
    SouthwestEthiopia: ["Bench Sheko Zone", "Dawro Zone", "Keffa Zone", "Sheka Zone", "Konta Zone", "West Omo Zone"],
    Tigray: ["Central Tigray", "East Tigray", "North West Tigray", "South Tigray", "South East Tigray", "West Tigray", "Mekele (special zone)"],
};

const firstSelector = document.getElementById('firstselector');
const secondSelector = document.getElementById('secondselctor');

firstSelector.addEventListener("change", function() {
  const selectedGroup = this.value;

  secondSelector.innerHTML = '<option value="">Select option</option>';

  if (selectedGroup && options[selectedGroup]) {
    options[selectedGroup].forEach(function(option) {
      const optionElement = document.createElement("option");
      optionElement.value = option;
      optionElement.textContent = option;
      secondSelector.appendChild(optionElement);
    });
  }
});


var userInput=document.getElementById('username');


userInput.addEventListener('input',function(){


var use=userInput.value;
var regex = /^[a-zA-Z]+$/;

if(!regex.test(use)){

userInput.setCustomValidity('only letters are allowed');
}
else{
  userInput.setCustomValidity('');
}
});



var emailInput=document.getElementById('emailvalid');



emailInput.addEventListener('input',function(){
  var em=emailInput.value;
var regex=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;

if(!regex.test(em)){
  emailInput.setCustomValidity('Please Enter valid format email');
}
else{
  emailInput.setCustomValidity('');
}


});



var phoneInput=document.getElementById('phonecount');


phoneInput.addEventListener('input',function(){



var phonein=this.value;

var regex=/^\d{10}$/;

if(!regex.test(phonein)){

  phoneInput.setCustomValidity('Please Enter Corrrect Phon neumber');
}
else{
  phoneInput.setCustomValidity('');
}


})
    </script>
</div>
</body>

</html>
