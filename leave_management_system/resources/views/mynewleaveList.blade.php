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

 <div class="table_container">
  
  <p class="heading">Leave List</p>
    
  <table>
    <tr>
      <th>S.n</th>
      <th>Name</th>

      <th>Submit Date</th>
        <th>Leave Date</th>
        <th>Return Date</th>
        <th>Status </th>
        <th>View Form </th>
    
       
      </tr>

      <?php
    $count = 1;?>



<tr>
    <td>{{$count++}}</td>
    <td>{{$list->name}}</td>

    <td>{{$list->created_at}}</td>
    <td>{{$list->leave_date}}</td>
    <td>{{$list->return_date}}</td>

    <td>
      
      @if ($list->status ==='approve')

        <span class="approve"> Approved <i class="fa-solid fa-circle-check"></i> </span>
      
          
      @elseif($list->status ==='pending')
        <span class="pending"> Pending <i class="fa-solid fa-hourglass-half"></i> </span>
      
      

      @else
        <span class="decline" >  Declined <i class="fa fa-window-close" aria-hidden="true"></i></span>
      
      
      @endif
    </td>
      <td>


    <a href="/leave_form_view/{{$list->id}}"> <i class="fa-solid fa-file fa-2xl"></i>   </a>
</td>

</tr>



</table>

</div>






</body>
@endsection

<style>

.table_container{
display: flex;
flex-direction: column;
top: 15px;
position: relative;

 
}

span{
  padding: 5px;
  color: rgb(66, 62, 62);
}
  .approve{
    color: white;
    background-color: green;
    
  }
p.heading{
  font-family: inherit;
padding:20px;
font-size: 1.7rem ;
color: #ccf4f7;
border-radius:10px; 

background-color: rgb(145, 148, 224);

box-shadow: 0px 2px 2px 1px #686767;
}
  .decline{
    background-color: red;
    color: white;
  }

  .pending{
    background-color: rgba(243, 255, 181, 0.986);
  }

    td.update_form{
display: flex;
gap: 5px;

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








