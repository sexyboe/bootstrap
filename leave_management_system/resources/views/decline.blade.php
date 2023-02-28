
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
    
      <h3>Declined List </h3> <span> Total Decline list : <strong>{{$count}}</strong></span>
    </div>
    
    <table>
      <tr>
        <th>S.n</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th> User Id</th>
        <th>Leave Date</th>
        <th>Return Date</th>
        <th>    &emsp;Status </th>
        <th>View Form </th>
        
        
      </tr>

      <?php
    $count = 1;?>

<tr>
  @forelse ($lists as $list)
    <td>{{$count++}}</td>
    <td>{{$list->name}}</td>
  
    <td>{{$list->user_id}}</td>
    <td>{{$list->leave_date}}</td>
    <td>{{$list->return_date}}</td>
    <td>
      
      @if ($list->status ==='decline')

<span class="decline"> Declined <i class="fa-regular fa-circle-xmark"></i> </span>
@endif
      

<td>

    <a href="leave_form_view/{{$list->id}}"> View form</a>
</td>

</tr>
@empty

<p class="message_pending"><strong>No List available </strong>   
</p>
    


@endforelse
</table>


</div>


@endif



  @if(in_array(auth()->user()->role, ['user']))


 
<div class="table_container">
  
  <p>Leave List</p>
    
  <table>
    <tr>
      <th>S.n</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th> User Id</th>
        <th>Leave Date</th>
        <th>Return Date</th>
        <th>View Form </th>
    
       
      </tr>

      <?php
    $count = 1;?>

@foreach ($lists as $list)

<tr>
    <td>{{$count++}}</td>
    <td>{{$list->firstname}}</td>
    <td>{{$list->lastname}}</td>
    <td><strong>{{$list->user_id}}</strong></td>
    <td>{{$list->leave_date}}</td>
    <td>{{$list->return_date}}</td>
      
        <td>
      
                           
            @if($list->status ==='pending')
              <span class="ending"> Approved <i class="fa-solid fa-circle-check"></i>
              </span>
       
            @endif
          </td>
    
<td>

    <a href="leave_form_view/{{$list->id}}"> View form</a>
</td>

</tr>

@endforeach

</table>

@endif

</div>

</body>
@endsection




<style>

  .decline{
    color: red;
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
padding: 15px;
}


tr:nth-child(odd) {
background-color: #adbece;
}

</style>













