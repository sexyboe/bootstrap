<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Leave;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    public function leave_action(Request $request)
    {

        $name = $request->name;
        $leave_type = $request->leave_type;
        $user_id = $request->id;
        $employee_id = $request->employee_id;
        $status = $request->status;
        $department = $request->department;
        $leave_date = $request->leave_date;
        $return_date = $request->return_date;
        $position_id = $request->position_id;
        $total_day = $request->total_days;
        $description = $request->description;


        $new_leave = new Leave;
        $new_leave->leave_type = $leave_type;
        $new_leave->name = $name;
        $new_leave->status = $status;
   
        $new_leave->user_id = $user_id;
        $new_leave->employee_id = $employee_id;
        $new_leave->position_id = $position_id;
        $new_leave->department = $department;
        $new_leave->leave_date = $leave_date;
        $new_leave->return_date = $return_date;
        $new_leave->total_day = $total_day;
        $new_leave->description = $description;

        $new_leave->save();

        // $my_list = Leave::all()->where('id', '=', $user_id);
        return redirect('/mynewleaveList/'.$new_leave->id)->with('message','Your Leave has been applied ');
       
    }
    public function newl($id){
        $lists = Leave::find($id);
        $employees = Employee::all();
        return view('/mynewleaveList', ['list' => $lists,'employees'=>$employees]);
    }
    public function pending()
    {

        $lists = DB::table('leaves')->where('status', '=', 'pending')->orderBy('created_at', 'desc')->get();
        $count = count($lists);
        return view('/pending', ['lists' => $lists, 'count' => $count]);
    }
    public function decline()
    {
        $lists = DB::table('leaves')->where('status', '=', 'decline')->orderBy('created_at', 'desc')->get();
        $count = count($lists);

        return view('/decline', ['lists' => $lists, 'count' => $count]);
    }
    public function approve()
    {

        $lists = DB::table('leaves')->where('status', '=', 'approve')->orderBy('created_at', 'desc')->get();
        $count = count($lists);
        return view('/approve', ['lists' => $lists, 'count' => $count]);
    }

    public function leave_list()
    {
$employees = Employee::all();
        $lists = Leave::all();
        $count = count($lists);
        return view('/leave_list', ['lists' => $lists, 'count' => $count,'employees'=>$employees]);
    }

    public function leave_form_view($id)
    {
      
        $lists = Leave::find($id);

        return view('/leave_form_view', ['lists' => $lists]);
    }

    public function update_status(Request $request, $id)
    {
        $status = $request->status;

        $new_list = Leave::find($id);
        $new_list->status = $status;
        $new_list->update();


        return redirect('/leave_list');
    }
    public function update_status_pending(Request $request, $id)
    {
        $status = $request->status;

        $new_list = Leave::find($id);
        $new_list->status = $status;
        $new_list->update();

        if ($new_list->$status == 'pending') {

            return redirect('/pending');
        }

        if ($new_list->status == 'decline') {
            return redirect('/decline');
        }
        if ($new_list->status == 'approve') {
            return redirect('/approve');
        }
    }

    //
    public function my_leave_list($id)
    {

        $my_list = DB::table('leaves')->where('user_id', $id)->orderBy('created_at', 'desc')->get();
    
        return view('/myleaveList', ['my_list' => $my_list]);
    }
}
