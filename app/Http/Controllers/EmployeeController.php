<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    //
    public function profile(){
        // $employee =User::orderBy('id','desc');
        return view('employee.employee');
    }

    public function editProfile($id){
        $employee = User::findorFail($id);
        // echo "<pre>";
        // print_r ($employee);
        return view('employee.edit_employee_profile',['employee'=>$employee]);
    }

    public function updateprofile($id ,Request $request){

        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required | email'
        ]);

        if($validator->passes()){
            $employee = User::find($id);
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->dob = $request->dob;
            $employee->birthday = $request->birthday;
            $employee->address = $request->address;
            $employee->save();

            //upload image
            if($request->image){
                $oldImage = $employee->image;

                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->image->move(public_path().'/upload/employees',$newFileName);
                $employee->image = $newFileName;
                $employee->save();

                File::delete(public_path().'/upload/employees'.$oldImage);
            }

            return redirect()->route('employees.profile');

        }else{
            return redirect()->route('employees.editProfile',$id)->withErrors($request)->withInput();
        }
    }


}
