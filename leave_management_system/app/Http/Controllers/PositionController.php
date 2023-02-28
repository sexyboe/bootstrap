<?php

namespace App\Http\Controllers;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function addPosition(Request $request)
  {

    $positions = $request->position;
    $salary = $request->salary;

    $new_Position = new Position;
    $new_Position->position = $positions;
    $new_Position->salary = $salary;
    $new_Position->save();
    
    return redirect('/position/');
  }

  public function delete($id)
  {
    $positions = Position::find($id);
    $positions->delete();
    return redirect('/position')->with('message' . $positions->position . 'has been deleted');
  }


  public function update_position($id)
  {
      $positions = Position::find($id);
      return view('/update_position', ['positions' => $positions]);
  }



  public function updatePosition(Request $request)
  {

    $positions = $request->position;
    $salary = $request->salary;
    $id = $request->id;

    $new_position = Position::find($id);
    $new_position->position = $positions;
    $new_position->salary = $salary;
    $new_position->update();
    return redirect('/position')->with('message','Position and salary  Updated'.$positions.'updated');
  }
}
