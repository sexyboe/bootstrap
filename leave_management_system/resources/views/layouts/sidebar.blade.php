@section('sidebar')
    

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="sidebar-wrapper">
        <div class="sidebar">

            @if(in_array(auth()->user()->role, ['admin']))
	
          <a href="/dashboard" class=""> Dashboard <i class="fa fa-window-restore" aria-hidden="true"></i> </a><br>
          <a href="/department" class="">Departments <i class="fa fa-briefcase" aria-hidden="true"></i> </a> <br>
          <a href="/position" class="">Position <i class="fa fa-briefcase" aria-hidden="true"></i> </a> <br>
        <a href="/add_employee" class=""> Add Employees <i class="fa fa-users" aria-hidden="true"></i> </a><br>
        <a href="/employee" class="">Employees <i class="fa fa-users" aria-hidden="true"></i> </a><br>
        {{-- <a href="/salary" class="">Salary <i class="fa fa-users" aria-hidden="true"></i> </a><br> --}}
        {{-- <a href="/leave_apply" class="">Apply Leave <i class="fa fa-users" aria-hidden="true"></i> </a><br> --}}
        <a href="/leave_list" class="">leave lists <i class="fa fa-users" aria-hidden="true"></i> </a><br>
       
        <a href="/pending" class="">Pending List <i class="fa fa-briefcase" aria-hidden="true"></i> </a> <br>
        <a href="/approve" class="">Approved List <i class="fa fa-briefcase" aria-hidden="true"></i> </a> <br>
        <a href="/decline" class=""> Declined List <i class="fa fa-briefcase" aria-hidden="true"></i> </a> <br>
        
        @endif

        @if(in_array(auth()->user()->role, ['user']))
        <a href="/dashboard" class=""> Dashboard <i class="fa fa-window-restore" aria-hidden="true"></i> </a><br>
        <a href="/leave_apply" class="">Apply Leave <i class="fa fa-users" aria-hidden="true"></i> </a><br>
        <a href="/my_leave_list/{{Auth::id()}}" class="">My lists <i class="fa fa-users" aria-hidden="true"></i> </a><br>
        <a href="/department" class="">Departments <i class="fa fa-briefcase" aria-hidden="true"></i> </a> <br>
        

        @endif


      </div>
      
      </div>
</body>
</html>
@endsection

<style>
  hr{
    color: #000;
  }

  .sidebar{
  
    display: flex;
    flex-direction: column;
    height: inherit;
   
  }
  .sidebar> a{
    margin-top: 10px;
text-decoration: none;
  }

    .sidebar-wrapper{
      z-index: 1;
      height: 100vh;
    position: relative;
padding:15px;

      background: rgb(42, 41, 43);
      
    }

</style>





