<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeLeaveController extends Controller
{
    //
    public function leave(){
        $user_id = Auth::user()->id;
        // $req = DB::table('leave_summaries')
        // ->where('user_id',$user_id);
        $leaves =Leave::all()->where('employee_id',$user_id);
        // return $leaves;
        return view('employee.employee_leave_page',['leaves'=>$leaves] );
    }

    public function applyleave(){
        return view('employee.apply-leave');
    }
    public function leaveStore(Request $request){
        // $validator = Validator::make($request->all(), [
        //     'name'=>'required',
        //     'email'=>'required | email',
        // ]);

        // if($validator->passes()){

            // $employee =new Employee();
            // $employee->fill($request->post())->save();

            $employee =new leave();
            $employee->leave_type = $request->leave_type;
            $employee->leave_from = $request->leave_from;
            $employee->leave_to = $request->leave_to;
            $employee->requested_days = $request->requested_days;
            $employee->leave_description = $request->leave_description;
            $employee->leave_status = 1;
            $employee->employee_id = Auth::user()->id;
            $employee->save();

            return redirect()->route('employees.leave');

        // }else{
        //     return redirect()->route('employees.create')->withErrors($request)->withInput();
        // }

    }

    public function leaveUpdate(){

        $leaves = Leave::all();
        return view('admin.employee_leaves_update',['leaves'=>$leaves] );
    }

    public function leaveUpdateStatus($id ,Request $request){
        $leaves = Leave::find($id);
        $leaves->leave_status = $request->leave_status;
        $leaves->save();

        return redirect()->route('employees.leaveUpdate');
    }
}
