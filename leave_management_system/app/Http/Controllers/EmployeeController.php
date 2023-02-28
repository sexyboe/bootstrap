<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class EmployeeController extends Controller
{
    

public function addEmployee(Request $request)
{


    $name = $request->name;
   
        $address = $request->address;
        $dp = $request->file('profile_photo');
        $phone = $request->phone;
        $position = $request->position_id;
        $department = $request->department;
        $dob = $request->dob;
        $user_id=$request->user_id;
        $gender = $request->gender;
        $email = $request->p_email;
 
$filephoto ='';

        if ($request->hasFile('profile_photo')) {
            $dp = $request->file('profile_photo');
            $filephoto = $dp->hashName();
            $path = $dp->move('dp/', $filephoto);
        }

     
        $new_employee = new Employee;
        $new_employee->name = $name;

        $new_employee->dob = $dob;
        $new_employee->dp = $filephoto;
        $new_employee->address = $address;
        $new_employee->gender = $gender;
        $new_employee->phone = $phone;
        $new_employee->position_id = $position;
        $new_employee->user_id = $user_id;
        $new_employee->p_email = $email;
        $new_employee->department = $department;
        $new_employee->save();

        return redirect('/newemployee/'. $new_employee->id);
    }

    public function newemployee($id)
    {
        $employees = Employee::find($id);
        return view('/newemployee', ['employees' => $employees]);
    }

    public function employee(){

        $employees = Employee::all();
        // $day = DB::table('leaves')
        // ->where('user_id', $employees)
        // ->sum('total_day') ;

        $count = count($employees);
    $leave = Leave::all();
        return view('/employee',['employees'=>$employees,'leave'=>$leave,'count'=>$count]);
    }

    public function salary($id){

      $leaves = Employee::all()->where('user_id',$id)->first();
    
        $q = DB::table('leaves')
        ->where('user_id', $id)
        ->sum('total_day') ;

        return view('/salary',['user'=>$leaves,'total_leave'=>$q]);
    }

    public function edit_employee($id){
        $department = Department::all();
        $employees = Employee::find($id);
        return view('/edit_employee', ['employees' => $employees,'departments'=>$department]);

    }
public function deleteEmployee($id){ 
         $employees = Employee::find($id);
   
        if ($employees->dp) {
            $image_path = public_path('dp/' . $employees->dp);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        $employees->delete();
        return redirect('/employee')->with('message', 'Employee record has been deleted');
    }
}

    public function editEmployee( Request $request){
       $name = $request->name;
       $employee_id = $request->employee_id;
        $address = $request->address;
        $phone = $request->phone;
        $position = $request->position_id;
        $department = $request->department;
        $dob = $request->dob;
        $user_id=$request->user_id;
        $gender = $request->gender;
        $email = $request->p_email;
 
         $filephoto ='';

        if ($request->hasFile('profile_photo')) {
            $dp = $request->file('profile_photo');
            $filephoto = $dp->hashName();
            $path = $dp->move('dp/', $filephoto);
        }
        
        
        $employee =  Employee::find($employee_id);
        $employee->name = $name;
        $employee->address = $address;
        $employee->dob = $dob;
        $employee->gender = $gender;
        $employee->phone = $phone;
        $employee->position_id = $position;
        $employee->user_id = $user_id;
        $employee->p_email = $email;
        $employee->department = $department;

        if ($employee->dp) {
            $image_path = public_path('dp/' . $employee->dp);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
            
        if ($filephoto) {
            $employee->dp = $filephoto;
        }
        $employee->update();
        
        return redirect('/newemployee/'. $employee->id)->with('message','Employee updated');
    }
    
}



    