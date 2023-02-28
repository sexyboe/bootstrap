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
  </style>
  
</head>
<body>
  <script src="/js/daycalculator.js"></script>
 <p class="title">Apply for Leave</p>

  <div class="container_form">
    <form action="/leave_action" method="POST">
      @csrf
      <input type="hidden" name="status" value="pending">

      <input type="text" name='id' value={{Auth::id()}} readonly>
      <input type="text" name='employee_id' value={{$employees->id}} readonly>

     
      <label for="fname">Name</label>
      <input type="text" id="fname" name="name" placeholder="Your name.." value="{{Auth::user()->name}}" readonly>
      <label for="department">Department
        <input type="text" id="department" name="department" placeholder="Your department.." value="{{$employees->department}}" readonly>

      </label>
      <label for="ltype">Position Id
        <input type="number" name="position_id" placeholder="Position ID" value="{{$employees->position_id}}" readonly>
    </label> 
      
      <label for="ltype">Leave Type

        <select id="leavetype" name="leave_type">
        <option value="Sick Leave"> Sick Leave</option>
        <option value="paid"> Paid</option>
          
          
        </select>

      </label>


  
      &emsp; &emsp;
      <label for="lname">Leave Days
        <input type="date" id="day1" name="leave_date" placeholder="Your leave date">
      </label>
      &emsp; &emsp;
      
      <label for="rlname">Return Date
        <input type="date" id="day2" name="return_date" placeholder="Your return date" >
  
      </label> 
      <label for="lname">Leave count
        <input type="text" id="total" name="total_days" readonly> 
      </label> 
      &emsp; 
      <span class='calc' onclick="calculateDays()"> Calculate</span>
      <br>
  
      <label for="subject">Description</label>
      <textarea id="subject" name="description" placeholder="Write something.." style="height:200px"></textarea>
  
      <input type="submit" value="Submit">
    </form>
  </div>
</body>



@endsection
