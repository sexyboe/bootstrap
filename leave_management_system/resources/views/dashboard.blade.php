@extends('layouts.app')
@extends('layouts.sidebar')

@section('container')
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  
  @if(in_array(auth()->user()->role, ['user']))

  <div class="dashboard">

    <div class="leave-container cards">

      {{-- <a href="/my_leave_list/{{$user_id}}"> Leave history</a> --}}
      <a href="/my_leave_list/{{Auth::id()}}"> Leave history</a>
    </div>
    <div class="leave-container cards">
<p>{{$file->first_name}}</p>
<img src="/dp/{{$file->dp}}" width=70px style = "border-radius: 60%; box-shadow: -1px  2px 1px 2px #4c4a4aad; " >
    </div>

  </div>
  
@endif
@endsection


<style>


.dashboard{
  padding-top: 20px;
width: 100%;
  flex-wrap: wrap;
  justify-content: center;
column-gap: 10px;
row-gap: 10px;
  display: flex;
flex-direction: row;

}

  .sidebar{
    
  }
  
  .button_ button:hover{
    background-color: rgb(255, 255, 255);
  }
  .title{
    width: 500px;
    display: flex;
justify-content: center;
background-color: #adbece;
  }
  
 
  
  
  .input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 100%;
    margin-bottom: 15px;
  }
  
  .icon {
    padding: 10px;
    background: dodgerblue;
    color: white;
    min-width: 50px;
    text-align: center;
  }
  
  .input-field {
    width: 100%;
    padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  color: rgb(0, 0, 0);
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 50%;
  background-color: aquamarine;


}

.btn>a{
  text-decoration:none;
  font-size: 1.2rem;
color: black;
}

.button_{
  display: flex;
  position: relative;
  flex-direction: row;
  background-color: rgb(153, 164, 174);




}

  </style>
