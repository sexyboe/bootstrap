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
bottom: 569px;
background-color: #8e99ad;
width: 83vw;
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
position: relative;
top: 20%;
align-items: center;
flex-direction: column;

}
.d{
  position: relative;
  left: 230px;
  bottom: 4px;
  background-color: red;
  padding: 14px;
  color: white;
  border-radius: 5px;
}
.pop a{
color:red;
}
  </style>
  
</head>
<body>

 <p class="title">Edit Employee</p>
  
  <div class="container_form">
    <form action="/editEmployee" method="POST"  enctype="multipart/form-data">
      @csrf
      <label for="fname">Full Name</label>
      <input type="text" id="name" name="name" placeholder="Full Name.." value="{{$employees->name}}">
      <input type="hidden" value="{{$employees->id}}" name="employee_id">
      <label for="address">Address</label>
      <input type="text" id="lname" name="address" placeholder="Address.."  value="{{$employees->address}}">
      <label for="photo">Photo  :
        @if($employees->dp)
        <img src="/dp/{{$employees->dp}}"  width='65px' style= 'border-radius:50px; position:relative; right:0px;' alt="" srcset=""> <br> <br>
        <input type="file" id="dp" value='{{old('dp')}}'  name="profile_photo"  > 
        
        @else <strong>No photo</strong>
        <input type="file" id="dp" value='{{old('dp')}}'  name="profile_photo"  > 
        @endif
      </label> <br>
      
      <br>
      <label for="phone number">Number</label>
      <input type="number" id="lname" name="phone" value="{{$employees->phone}}" placeholder="Number..">
      
      &emsp;
      <label for="ltype">User Id
        <input type="number" name="user_id" placeholder="Give User ID"  value="{{$employees->user_id}}">
    </label> 
      &emsp;
      <label for="ltype">Position Id
          <input type="number" name="position_id" placeholder="Position ID"  value="{{$employees->position_id}}">
      </label> 

      <br> <br>
      <label for="phone number">Email</label>
      <input type="email" id="email" name="p_email" placeholder="Employee Email."  value="{{$employees->p_email}}">
    
&emsp;  <label for="dob" > Date of Birth
  <input type="date" name="dob"  value="{{$employees->dob}}">
 </label>
 <br> <br>
      <label for="department">Department
        <select id="department" name="department" value="{{$employees->phone}}">
          @foreach ($departments as $department)
          <option value="{{$department->department_name}}">{{$department->department_name}}</option>
          @endforeach

        </select>
      </label>
      &emsp;
      
      &emsp;
      <label for="gender"> Gender
        <select name="gender" id="gender"  value="{{$employees->gender}}">
          <option value="Male"> Male</option>
          <option value="Female"> Female</option>
          <option value="Other"> Other</option>
        </select>
        
      </label>
      <input type="submit" value="Update" class="add">
      <span id="myBtn" class="d"> Delete</span>   
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
      
      <hr>
    </form>
  </div>
</body>



@endsection
