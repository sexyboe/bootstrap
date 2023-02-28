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

  {{-- @if(in_array(auth()->user()->role, ['user'])) --}}
	<style>

    input[type=text], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
  }
  
  input[type=submit] {
    background-color: #04AA6D;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  input[type=submit]:hover {
    background-color: #45a049;
  }
  
  .container_form {
    border-radius: 1px;
    background-color: #f2f2f2;
    padding: 30px;
  }

  h3{
    background-color: rgb(148, 158, 210);
    width: 100%;
    padding: 4px;
    color: rgb(94, 39, 123);
  }

  .calc{
padding: 4px;
    background-color: #ccc;
    cursor: pointer;
  }
  
  .calc:hover{
font-size: 1.06rem;
    background-color: rgb(209, 209, 209);
    cursor: pointer;
border-radius:5px; 
  }


p.title{
  font-size: 1.5rem;
  padding: 4px;
  margin: 5px;
}

.add
{
  position: relative;
  float: right; 
  top: 25px;
}
  </style>
  
</head>
<body>

 <p class="title">Add Employee</p>
  
  <div class="container_form">
    <form action="/addEmployee" method="POST"  enctype="multipart/form-data">
      @csrf
      <label for="fname">Full Name</label>
      <input type="text" id="name" name="name" placeholder="Full Name..">
      
      <label for="address">Address</label>
      <input type="text" id="lname" name="address" placeholder="Address..">
      
      <input type="file" id="dp" name="profile_photo" placeholder="choose employee photo ..">
      
      <br>
      <label for="phone number">Number</label>
      <input type="number" id="lname" name="phone" placeholder="Number..">
      
      &emsp;
      <label for="ltype">User Id
        <input type="number" name="user_id" placeholder="Give User ID">
    </label> 
      &emsp;
      <label for="ltype">Position Id
          <input type="number" name="position_id" placeholder="Position ID">
      </label> 

      <br> <br>
      <label for="phone number">Email</label>
      <input type="email" id="email" name="p_email" placeholder="Employee Email.">
    
&emsp;  <label for="dob" > Date of Birth
  <input type="date" name="dob">
 </label>
 <br> <br>
      <label for="department">Department
        <select id="department" name="department">
          @foreach ($departments as $department)
          <option value="{{$department->department_name}}">{{$department->department_name}}</option>
          @endforeach

        </select>
      </label>
      &emsp;
    
      &emsp;
      <label for="gender"> Gender
         <select name="gender" id="gender">
            <option value="Male"> Male</option>
            <option value="Female"> Female</option>
            <option value="Other"> Other</option>
          </select>

      </label>
      
      <input type="submit" value="Add" class="add">
      <hr>
    </form>
  </div>
</body>



@endsection
