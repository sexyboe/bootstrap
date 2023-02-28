<?php

namespace App\Http\Controllers;

use App\Models\Department;

use Illuminate\Http\Request;


class DepartmentController extends Controller
{

  public function addDepartment(Request $request)
  {

    $department_name = $request->department;

    $new_department = new Department;
    $new_department->department_name = $department_name;
    $new_department->save();



    return redirect('/department');
  }

  public function delete($id)
  {
    $department = Department::find($id);
    $department->delete();
    return redirect('/department')->with('message' . $department->department_name . 'has been deleted');
  }


  public function update_department($id)
  {
      $departments = Department::find($id);
      return view('/update_department', ['departments' => $departments]);
  }



  public function updateDepartment(Request $request)
  {

    $department = $request->department;
    $id = $request->id;
    // make lable hidden after passing the id

    $new_department = Department::find($id);
    $new_department->department_name = $department;
    $new_department->update();
    return redirect('/department')->with('message','Department Updated'.$department.'updated');
  }

}
