<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    //
    public function index(){
        $employees =User::orderBy('id','desc')->Paginate(5);
        return view('admin.list',['employees'=>$employees]);
    }

    public function create(){
        return view('admin.add_employee');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required | email',
        ]);

        if($validator->passes()){

            // $employee =new Employee();
            // $employee->fill($request->post())->save();

            $employee =new User();
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->password = Hash::make($request->password);
            $employee->dob = $request->dob;
            $employee->birthday = $request->birthday;
            $employee->basic_salary = $request->basic_salary ;
            $employee->department = $request->department ;
            $employee->type = $request->designation;
            $employee->address = $request->address;
            $employee->save();

            //upload image

            if($request->image){
                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->image->move(public_path().'/upload/employees',$newFileName);
                $employee->image = $newFileName;
                $employee->save();
            }

            return redirect()->route('employees.index');

        }else{
            return redirect()->route('employees.create')->withErrors($request)->withInput();
        }

    }

    public function edit($id){
        $employee = User::findorFail($id);
        // echo "<pre>";
        // print_r ($employee);
        return view('admin.edit_employee',['employee'=>$employee]);
    }

    public function employeeUpdate($id ,Request $request){

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
            $employee->department = $request->department ;
            $employee->type = $request->designation;
            $employee->basic_salary = $request->basic_salary ;
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

            return redirect()->route('employees.index');

        }else{
            return redirect()->route('employees.edit',$id)->withErrors($request)->withInput();
        }
    }

    public function destroy($id,Request $request){
        echo"deleted";
        $employee = User::findOrFail($id);
        File::delete(public_path().'/upload/employees'.$employee->image);
        $employee->delete();

        return redirect()->route('employees.index');
    }
}
