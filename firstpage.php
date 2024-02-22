
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
#userinput{
  width:300px;
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


@keyframes horizontal {
  
0%{
transform: translateX(0);
}

20%{
  transform:translateX(20%);
}

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
.error{
  color:red;
}


.btn1:hover{
background-color: #f8f8f8;
box-shadow:0 2px 4px rgba(0,0,0,0.2);
cursor:pointer;

}
</style>
</head>
<body>


    <div  id="rr" class="container mt-2">

    <div class="d-flex mt-3">
    <div  class="container border bg-light mt-2 p-2" id="para">
      <p>How many students would you like to donate to? Input in to the form </p>
    </div>
    <div class="container mt-2 p-1 ml-2">
      <form>
    <input id="userinput" type="number" class="form-control"  placeholder="Input numbers">
    </form>
    </div>
    
    
    </div>
    <div  id="bttn" onclick="dis()" class="alert alert-info alert-dismissible mt-2">
    <p>If you do not select manually, the system will randomly select students based on the order of their application</p>
  <button class="btn btn-close" data-bs-dismiss></button>
  </div>
    
    <div class="row">

   

    <div class="col mt-2">
    <div class="form-group">
    <select id="gender" class="form-select">
<option value="">Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>


    </select>

</div>
</div>



<div class="col mt-2">
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


<div class="col mt-2">
<div class="form-group">
<select id="secondselctor" class="form-select">
    <option value="">Zone</option>
   
</select>

</div>
</div>




<div class="col mt-2">
    <div class="form-group">
      <form>
      

  <input type="text" name="search" class="form-control" id="serchschool" placeholder="School Search">
</form>
    </select>

</div>
</div>
<!--
<div class="col">
    <div class="form-group">
     

    <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExa2NldHY3anI1N2Rja3NzMnNhdGFuaWhhbHhvZnJvb3BkOGQ4NTE4ZSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/PnzZ9Fwq3Fl1vLsY3O/giphy.gif" alt="Person Animation" width="100" height="100" id="person-image">
    </select>

</div>
</div>
-->
</div>






<div class="d-flex">

<div   class="container mt-2 mb-1 bg-white text-info">
<img style="display:none;" id="imgg" src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExa2NldHY3anI1N2Rja3NzMnNhdGFuaWhhbHhvZnJvb3BkOGQ4NTE4ZSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/PnzZ9Fwq3Fl1vLsY3O/giphy.gif" alt="Person Animation" width="100" height="100" id="person-image">
</div>
</div>
<div class="container mb-1 text-center bg-white text-info">
<p id="selectedcount"></p>
</div>
<div class="container mt-2 text-success text-center">
<p id="Totalsum"></p>
</div>
<table id="example" class="responsive-table" style="width:100%;">
    


    <thead>

   
        <tr>

        




<th data-table="Id" style="display:none;">Id</th>
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
            <td style="display:none;"><?php echo $row['id'] ?></td>
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

<div class="container mb-2 text-right">
    
    <button type="button" id="submitbutton" class="btn btn-success" style="background-color:#9932cc;">Donate</button>


</div>


<div class="modal" id="Mymodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form to donate</h4>
        <button type="button" class="btn-close" id="disfirst" onclick="closefirstmodal()" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="container border mb-3">
          <p id="summerytext"></p>
          <p id="idval"></p>
        </div>
        <form id="myform">
          <div class="form-group mt-2">
            <label for="inputName"><span style="color:#9932cc;font-size:20px;"><i class="fa fa-user"></i>&nbsp;</span>User Name</label>
            <input type="text" id="name" placeholder="Enter your name" name="username" class="form-control mt-2" required>
          </div>
          <div class="form-group mt-2">
            <label for="inputName"><span style="color:#9932cc;font-size:20px;"><i class="fa fa-envelope"></i>&nbsp;</span>Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" class="form-control mt-2">
          </div>
          <div class="form-group mt-2">
            <label for="inputName"><span style="color:#9932cc;font-size:20px;"><i class="fa fa-address-card-o"></i>&nbsp;</span>Address</label>
            <input type="text" id="address" placeholder="Enter your address" name="address" class="form-control">
          </div>
          <div class="form-group mt-2">
            <label for="inputName"><span style="color:#9932cc;font-size:20px;"><i class="fa fa-phone"></i>&nbsp;</span>Phone</label>
            <input type="number" id="phone" name="phone" placeholder="Enter your phone number" class="form-control">
          </div>
          <div  class="form-group mt-3 mb-3 text-center">
            <button type="submit"   style="width:70%;"  class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      
      </div>
    </div>
  </div>
</div>

<div class="modal" id="secondmodal" style="display:none;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pay With</h4>
        <button type="button" class="btn-close" aria-label="Close" onclick="closemodel()" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
      <div id="progressIndicator" class="d-flex justify-content-center align-items-center" style="display: none;">
  <div class="spinner-border text-primary" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>
<div class="d-flex">


<div class="container">
        <button type="button" class="btn1">
        <img src="santimpay.png" alt="image of santim pay" width="200" height="200">
</button>
</div>

<div class="container">
        <button type="button" class="btn1">
        <img src="papal.png" alt="image of santim pay" width="200" height="200">
</button>
</div>

</div>
  </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>








</div>




<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


    <script type="text/javascript">
        new DataTable('#example');
$(document).ready(function(){
$("#example").DataTable();
});



function dis(){
  document.getElementById('bttn').style.display='none';
}


function closefirstmodal(){

  document.getElementById('Mymodal').style.display='none';
}

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
            var userInput=0;
     
            

          
            $('#gender').on('change',function()
            {

            var selectgender=$(this).val();

            if(selectgender === 'Male'){
                table.column(6).search('^' + selectgender + '$',true,false).draw();

            }
            else{
                table.column(6).search(selectgender).draw();
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


            table.column(7).search(reg).draw();

            });

            //for selection buy grade 

            $('#secondselctor').on('change',function()
            {

            var grade=$(this).val();

            table.column(8).search(grade).draw();
            });




            //for changing color when selcted row

      


  $('#userinput').on('input',function(){


    table.$('tr.selectedroo').removeClass('selectedroo');


     userInput= parseInt($('#userinput').val());




  });
  

  var confirmationShown=false;

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




   

selectedCount = selectedRows.length; 


//to updare the selected count
    $('#selectedcount').text('Total Selected: ' + selectedCount );

    if( userInput > 0){


   if(selectedCount > userInput && !confirmationShown){

    var confirmaiton=window.alert(`your selection of student is${selectedCount} greeate than you entered`);



    confirmationShown=true;


    if(!confirmaiton){
      selectedRows.pop();
      //it is return the last row
      $(this).removeClass('selectedroo');
      selectedCount=selectedRows.length;


      $('selectedcount').text('the total number of Selected is:'+ selectedCount);
    

    }
   }


}



var tot=0;
for (var i= 0;  i < selectedRows.length; i++)
{
    var rowIndex=selectedRows[i];

    var rowData=table.row(rowIndex).data();

    var cost=500;


    tot += cost;
}

totalCost=tot;

var dollaramount=parseInt(totalCost*0.036);

$('#Totalsum').text('TotalSelectedCost is: ' + totalCost + ' or '+' '+ dollaramount + '$');


    if ($(this).hasClass('selectedroo')) {
      // Perform actions with selected row
    } else {
      // Perform actions with deselected row
    }
  });
  var selectedid=[];
  
$('#submitbutton').on('click',function(){
  
  selectedid=[];


  ///let create three condition for checking the user selectionand random select



  if(selectedCount===0 && userInput> 0){



    //selectedCount=userInput;

    table.$('tr.selectedroo').removeClass('selectedroo');


var visiblerow=table.rows({ search: 'applied', page: 'current' }).nodes();


selectedRows=$(visiblerow).slice(0,userInput);

$(selectedRows).addClass('selectedroo');

selectedCount=$(table.rows('.selectedroo').nodes()).length;




//let get thier id and data

for(var i=0; i<selectedCount; i++){

  var rowindex=selectedRows[i];

  var rowData=table.row(rowindex).data();



  var firstid=rowData[0];


  selectedid.push(firstid); 
}


var result={
    sele:selectedid
  };


  var resultjson=JSON.stringify(result);

  console.log(resultjson);


selectedCount=userInput;


var tot=0;
var fixed=500;

//let calsulate the cost of values

for(var i=0; i<selectedCount; i++){

tot+=fixed;


}
totalCost=tot;
var dollaramount=parseInt(totalCost*0.036);

  }

  //================end of if class==
  else if(selectedCount !== 0 &&  selectedCount < userInput){
   



    var selectedbyitself=userInput-selectedCount;


    for(var i=0; i<selectedCount; i++){

   var rowindex=selectedRows[i];

   var rowData=table.row(rowindex).data();

   var idvaluefirsrt=rowData[0];

   selectedid.push(idvaluefirsrt);
    }



    var currentpage=table.rows().data().toArray();



    for(var i=0; i< currentpage.length && selectedbyitself > 0; i++){

      var rowindex=i;
      if(!selectedRows.includes(rowindex)){
        var rowData=table.row(rowindex).data();

        var idvalue=rowData[0];
        selectedid.push(idvalue);
        selectedbyitself--;
      }
    }


var result = {
  SelectedIDs: selectedid
 
};




/*
    var availableRows = [];
  for (var i = 0; i < table.rows().count(); i++) {
    if (!selectedRows.includes(i)) {
      availableRows.push(i);
    }
  }
  
  var randomIndices = [];
  for (var i = 0; i < selectedbyitself; i++) {
    var randomIndex = Math.floor(Math.random() * availableRows.length);
    randomIndices.push(randomIndex);
    availableRows.splice(randomIndex, 1);
  }
  
  randomIndices.sort();
  for (var i = 0; i < randomIndices.length; i++) {
    var rowindex = availableRows[randomIndices[i]];
    var rowData = table.row(rowindex).data();
    var idvaluefirsrt = rowData[0];
    selectedid.push(idvaluefirsrt);

  
  }

*/
  //toconvert in t json add the slecte dorws and random indeices

  // ...






var jsonresult = JSON.stringify(result);

console.log(jsonresult);

// ...

  

 selectedCount=userInput;

  var tot=0;
  var cost=500;

  for(var i=0; i< userInput; i++){

    tot+=cost;
    
  }

  totalCost=tot;

  var dollaramount=parseInt(totalCost*0.036);
  }

  //===================end of if cluase ============================

else if( selectedCount >= userInput)
{

 
  selectedCount =selectedRows.length;

var total=0;
var fixed=500;
for(var i=0; i<selectedCount; i++){
var rowindex=selectedRows[i];

var rowData=table.row(rowindex).data();


var idvalue=rowData[0];

selectedid.push(idvalue);

total+=fixed;
}

var result={
slee:selectedid
};


var seson=JSON.stringify(result);

console.log(seson);

totalCost=total;
var dollaramount=parseInt(totalCost*0.036);
}


else{
  
  selectedCount =selectedRows.length;

var total=0;
var fixed=500;
for(var i=0; i<selectedCount; i++){
var rowindex=selectedRows[i];

var rowData=table.row(rowindex).data();


var idvalue=rowData[0];

selectedid.push(idvalue);

total+=fixed;
}

var result={
slee:selectedid
};


var seson=JSON.stringify(result);

console.log(seson);

totalCost=total;
var dollaramount=parseInt(totalCost*0.036);

}

//end ofelse clasuse =======================================


var summeryText= 'Total Number of Selected: ' + selectedCount +'&nbsp; Student' +'<br> Total cost is: '  + totalCost + 'Birr  or '+' '+ dollaramount + '$';

document.getElementById('summerytext').innerHTML=summeryText;


var modal=new bootstrap.Modal(document.getElementById('Mymodal'));

if(userInput > 0 || selectedCount > 0){
  modal.show();
}
else{
window.alert('you have not selected any student,back and tray again');
}



modal._element.addEventListener('hidden.bs.modal',function()
{

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



$(document).ready(function(){
  function onchaa(){
  $('#submitid').on('click',function(){
   document.getElementById('Mymodal').style.display='none';
  document.getElementById('secondmodal').style.display='block';


  });

//document.getElementById('Mymodal').style.display='none';
//document.getElementById('secondmodal').style.display='block';
}
$('#myform').validate({

rules: {

name: {
  required:true,
  pattern:/^[abc]+$/i
},

email:{
  required:true,
  email:true
},
address:{
  required:true,
  minlength:6
},


phone: {
  required:true,
  //pattern of phone number
}


},

messages:{

  name:{
    required:'please enter your name',
    pattern: 'please enter only string value'
  },


  email:{
    required:'please enter your email',
    email:'Please enter a valid email'
  },
  
  address:{
    required:'please enter your address',
    minlength: 'the length must be greater than5'
  },

  phone:{
    required:'Please enter your phone',
   
  }
},


errorClass: 'error',
submitHandler :function(form){
 var name=$('#name').val();
 var email=$('#email').val();

 var address=$('#address').val();

 var phone=$('#phone').val();
 console.log('Name:', name);
      console.log('Email:', email);
      console.log('Address:', address);
      console.log('Phone:', phone);

      // Optionally, you can submit the form programmatically
      // form.submit();
    // bootstrap.Modal(document.getElementById('Mymodal').style.display='none');





      // bootstrap.Modal(document.getElementById('secondmodal').style.display='block');
// Show the second modal with payment options



var formData={

  name:name,
  email:email,
  address:address,
  phone:phone
};


var progreess= new bootstrap.Modal(document.getElementById('progressIndicator'));

$('#progressIndicator').show();

$.ajax({
  
url:'submitdonate.php',
type:'POST',
data: formData,
success:function(response){
console.log(response);


$('#Mymodal').modal('hide');


var modale=new bootstrap.Modal(document.getElementById('secondmodal'));

modale.show();
$('#progressIndicator').modal('hide');
},
error:function(xhr,status,error){
  console.log(error);
}



});


}


});



});


    </script>
</div>
</body>

</html>
