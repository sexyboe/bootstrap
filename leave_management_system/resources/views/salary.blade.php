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
	
  <div class="addD">
      

</div>


<div class="table_container">
  
  <p class="heading">Salary List</p>
    
    
  <table>
    <tr>
      <th>S.n</th>
      <th>Photo</th>
        <th>Employee</th>
        <th>Employyee I.D</th>
        <th>Basic Salary</th>
        <th>Total Leave </th>
        <th> Total Salary</th>
      </tr>
      <?php
    $count = 1;?>



<tr>
  <td>{{$count++}}</td>
  <td> <img src="/dp/{{$user->dp}}" width=70px height=70px; style = "border-radius: 60%; box-shadow: -1px  2px 1px 2px #4c4a4aad; object-fit:contain;" ></td>
  <td>{{$user->name}}</td>
  
  <td>{{$user->id}}</td>
  <td> RS.{{$user->position->salary}}/-</td>
  <td>{{$total_leave}}</td>
  
  <td> 
   
    @if($total_leave == '0')
      RS.{{$user->position->salary}}/-

    
@elseif($total_leave > '7')
  @php
  $salary =  $user->position->salary;
 $total = $salary - (0.1 * $salary);


@endphp
<span class="salary">
  
  Rs.{{$total}}/-
</span>

@elseif( $total_leave<='7')
  @php
  $salary =  $user->position->salary;
 $total = $salary - (0.05 * $salary);


@endphp
<span class="salary">

  Rs.{{$total}}/-
</span>

    
@endif
   
  </td> 
  
</tr>
</table>

</div>
@endif







</body>
@endsection

<style>

  span.salary{
font-weight: bold;
    color: rgb(1, 150, 1);
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
  }
p.heading{
  font-family: inherit;
padding:20px;
font-size: 2rem ;
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


