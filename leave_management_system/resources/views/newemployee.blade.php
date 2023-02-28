@extends('layouts.app')
@extends('layouts.sidebar')

@section('container')
@csrf
@if(session('message'))
<div id="state">
<div class="message">
    <button onclick="myFunction()"> <i class="fa fa-times"></i></button>
  <span class='m-text'>
      {{session('message')}}
    </span>
</div>
    <script>
        function myFunction() {
      var x = document.getElementById("state");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    </script>
</div>
@endif
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


  
  @if(in_array(auth()->user()->role, ['admin']))
  <div class="table_container">
    <div class="title1">
    
      <h3>Employee List </h3> <span> Total Employee : <strong></strong></span>
    </div>

    <table>
      <tr>
        <th>S.n</th>
        <th>Name</th>
        <th>User Id</th>
        <th>Department </th>
        <th>Position </th>
        <th>Salary </th>
        <th>Gender</th>
        <th>Address</th>
        <th>Date of Birth</th>
        <th>Phone</th>
        <th>Photo</th>
        <th>Edit</th>
        
        
      </tr>
      <?php
    $count = 1;?>

<tr>


    <td>{{$count++}}</td>
    <td>{{$employees->name}}</td>
    <td>{{$employees->user_id}}</td>
    <td>{{$employees->department}}</td>
    <td>{{$employees->position->position}}</td>
    <td>
     <a href="/salary/{{$employees->user_id}}">    {{$employees->position->salary}}
     </td></a> 
    <td>{{$employees->gender}}</td>
    <td>{{$employees->address}}</td>
    <td>{{$employees->dob}}</td>
    <td>{{$employees->phone}}</td>
    <td> <img src="/dp/{{$employees->dp}}" width=70px style = "border-radius: 60%; box-shadow: -1px  2px 1px 2px #4c4a4aad; " ></td>
    <td><a class="edit" href="/edit_employee/{{$employees->id}}"> Edit</a>
     <span id="myBtn"> Delete</span>    </td>
    
  </tr>
  
</table>
<div class="modal1" id="myModal">

  <div class="pop" id="pop">
    <span class="wrong close"  onclick="wrongFunction()"  id="x">&times;</span>
    <p>Do you really wana delet this Employee</p>
    <a class="edit" href="/delete_employee/{{$employees->id}}"> Delete</a>
  <script>
  
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
  </script>
  </div>
</div>

</div>


@endif


</body>
@endsection




<style>
  span.wrong{
    position: relative;
    left: 470px;
    font-size: 1.3rem;
    background-color: rgb(71, 61, 61); 
    color: white;
    padding-left: 8px;
    padding-right: 8px;
    padding-bottom: 2px;
    border-radius:100%; 
    cursor: pointer;

    
  }
.modal1{
display:none ;
position: relative;
bottom: 260px;
background-color: #8e99ad;
width: 1500%;
height: 100vh;
}
a{
  cursor: pointer;
}
.pop
{
  padding: 20px;
  display: flex;
  background-color: #d1dbe1;
justify-items: center;
align-items: center;
flex-direction: column;

}
.pop a{
color:red;
}

   .title1{
  
    background: #a7d4f8;
    font-size: 1.1rem;
    border-radius:9px; 
    width: 100%;
    padding: 5px;
    flex-direction: row;
    position: relative;
    top: 20px;

    box-shadow: 0px 2px 2px 1px #686767;
  }
  .title1 h3{
    padding:15px; 
    float: left;
    position: relative;
    left: 20px;
  }
  .title1 span{
    background-color: #dbe7f3;
    padding: 25px 50px 25px 50px; 
    border-radius:20px; 
    float:right;
  }

  .message_pending{
height: 100%;
position: relative;
top: 100px;
padding: 40px;
text-decoration:underline;
font-family: Verdana, Geneva, Tahoma, sans-serif;
font-size: 1.1rem;
text-align: center ;
width: 100%;
color: rgb(194, 90, 90);
background-color: #3adfe5;
box-shadow: 5px 4px 7px 2px #888888;

  }

  .table_container{
    position: relative;
    display: flex;
    align-items: center;
    flex-direction: column;
row-gap: 30px;
  }


  

  form{

    display: flex;
    flex-direction: row;
    background-color: #adbece;
    padding: 10px;
    align-items: center;
    column-gap: 25px;
  }
.show{
  cursor: pointer;
}
  .update_modal{
    display: block;
  }

  .main-b{
    position: relative;
    bottom:80px;
  }

  .addD h3{
    position: relative;
    left: 30px;
     font-family:Arial, Helvetica, sans-serif
  }

  .input-container{
    justify-content: center;
  }

  table {

border-collapse: collapse;
width: 80vw;
border: 1px solid black;
}

th{
border:1px solid black;

}

td, th {

text-align: left;
padding: 5px;
}


tr:nth-child(odd) {
background-color: #adbece;
}

</style>








