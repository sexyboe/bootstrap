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
	


  <div class="po">

      <div class="addD">
          
<h3>  ADD New  </h3>
<form action="/addPosition" method="post">
    @csrf  
  <div class="button_">
    <input class="input-field" type="text" placeholder="Position" name="position">
    <input class="input-field" type="number" placeholder="Salary" name="salary">
    <input type="submit" value="Add" name="submit" id="submit">
    
</div>
</form>

</div>


<div class="table_container">
  
  <p class="heading">Possition and Salary List</p>
    
  <table>
    <tr>
        <th>S.n</th>
        <th>Position</th>
        <th>Salary</th>
        <th>Change</th>
      </tr>
      <?php
    $count = 1;?>

@foreach ($positions as $position)

<tr>
  <td>{{$count++}}</td>
  <td>{{$position->position}}</td>
  <td>{{$position->salary}}</td>
  
  <td>
      <div class="change">
          
          <a href="/update_position/{{$position->id}}">Update</a>
        <a href="/deletePosition/{{$position->id}} ">Delete</a>
    </div>
      
    </td>
</tr>



@endforeach

</table>

</div>
@endif
</div>

@if(auth()->user()->role== 'user')


<div class="table_container_user">
  
  <p class="heading">Department List</p>
    
  <table>
    <tr>
      <th>S.n</th>
        <th>Department</th>
        <th>Department I.D</th>
        <th>Total Employee</th>
      </tr>
      <?php
    $count = 1;?>

@foreach ($positions as $position)

<tr>
  <td>{{$count++}}</td>
  <td>{{$position->position}}</td>
  <td>{{$position->salary}}</td>
  <td> 4</td>

</tr>



@endforeach

</table>

</div>
@endif








</body>
@endsection

<style>


.po{
margin: 20px;
    display: flex;
    flex-direction: column;
    row-gap: 25px;
}
p.heading{
  font-family: inherit;

font-size: 1.7rem ;

text-align: center;
box-shadow: 0px 1px 2px 1px #686767;
color: #ffffff;
background-color: rgb(145, 148, 224);

}
  .table_container_user{
    
    position: relative;
  bottom: 140px;
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
.addD{
    border-radius:10px; 
    box-shadow: 0px 2px 2px 1px #686767;
    background-color: #adbece;
column-gap: 50px;
    display:flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
  .addD h3{
 padding-top:5px; 
    font-family:Verdana, Geneva, Tahoma, sans-serif;
    color: rgba(38, 37, 40, 0.97);
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


