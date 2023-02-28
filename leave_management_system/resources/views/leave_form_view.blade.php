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
  
  {{-- @if(in_array(auth()->user()->role, ['admin']))
  --}}

  <div class="form_container">
    <div class="dp">
      <img src="/dp/{{$lists->employee->dp}}" >
    </div>
    <p class="details"><strong> Name :</strong>
      <span class="details">
        {{$lists->name}} <br>
      </span>
    </p>
    
  
       
  <p class="details"> <strong> Department :</strong>
         <span class="details">
           {{$lists->department}} <br>
          </span>
        </p>
        <p class="details"><strong> Total days :</strong>
             <span class="details">
                {{$lists->total_day}}
              </span>
        </p>
        <p class="details"><strong> Position :</strong>
             <span class="details">
                {{$lists->position->position}}
              </span>
        </p>
        
      <p class="details"> <strong> Applied at :</strong>
           <span class="details">
              {{$lists->created_at}} <br>
          </span>
      </p>
      <p class="details"> <strong> Description </strong><br>
        <p class="des">
          {{$lists->description}} <br>
        </p>
        <p class="details"><strong> Status :</strong>
             <span class="details">
              @if($lists->status == 'pending')
             <strong>Pending</strong>
                @elseif($lists->status == 'approved')
      Approved
      @else
      
      Declined
      @endif
            </span>
        </p>
      </div>
      
      @endsection
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
      <style>
.form_container
{
width: 50%;
  background-color: rgb(205, 213, 233);
  font-size: 1.2rem;
  display: flex;
  flex-direction: column;
 
  padding: 30px;
  color: rgb(30, 27, 118)
}
.des{
padding: 10px;
  background-color: rgba(188, 218, 236, 0.708);
  box-shadow: 1px 1px 2px 1px #686767;
}

.dp{
  width: 100%;
  height: 105px;
  background-color: #9db0ed81;
  position: relative;
  bottom: 10px;
  border-radius:10px; 
  
}
.dp img{ 

  object-fit:contain;
  border-radius:50px;
  width: 100px;
  position: relative;
  box-shadow: 0px 1px 2px 1px #383737;
left: 180px;



}

</style>
