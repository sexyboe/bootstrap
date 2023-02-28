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
    <div class="addD">
      
<h3>Update Position</h3>
<form action="/updatePosition" method="post">
  @csrf  
  <input type="hidden" name='id' value="{{$positions->id}}">
  <div class="button_">
    <span> <strong>I.D : {{$positions->id}} </strong> </span> &emsp;
    <input class="input-field" type="text" value="{{$positions->position}}" name="position"> 
    <input class="input-field" type="number" value="{{$positions->salary}}" name="salary"> 
    <input type="submit" value="Update" name="submit" id="submit">
    
    </div>
</form>

</div>

  


</body>
@endsection

<style>

    span{
        background-color: #cae2f8;
        padding: 5px;
        color: rgb(94, 53, 94);
    }
  form:hover{
      box-shadow: 0px 2px 2px 1px #686767;
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
    display:flex ;
    flex-direction:column;
    justify-content: center; 
    align-content: center;
    position: relative;
    row-gap: 20px;
 top: 10%;
}
h3{
    color: #726eea;
    padding: 10px;
    text-align: center;
    box-shadow: 0px 2px 2px 1px #686767;
    
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


