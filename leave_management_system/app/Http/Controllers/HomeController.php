<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/home');
    }
    public function dashboard()
    {
        $user_id = Auth::id();
        $file = Employee::where('user_id', $user_id)->first();
        
        return view('/dashboard',['user_id'=>$user_id,'file'=>$file]);
    }
    
    public function add_employee()
    {

        if (Auth::user() && Auth::user()->role === 'admin') {

            $departments = Department::all();
           return view('/add_employee',['departments'=>$departments]);
        } 
        return ('Cant by pass this route .Only for Admins');
    }

    public function department()
    {
        $departments = Department::all();
        return view('/department',['departments'=>$departments ]);
    }
    public function applyLeave()
    {

        $user_id = Auth::id();
        $employees = Employee::where('user_id', $user_id)->first();
        return view('/leave_apply',['id'=>$user_id ,'employees'=>$employees]);
    }

    public function position(){

        $positions = Position::all();
        return view('/position',['positions'=>$positions]);
    }


}
