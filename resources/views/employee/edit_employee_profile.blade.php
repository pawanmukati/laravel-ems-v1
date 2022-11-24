@include('layouts.sidebar')

    <div class="container">
        <div class="header py-5 d-flex align-items-center justify-content-between">
            <h4>Edit Profile</h4>
            <a href="{{ route('employees.profile') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="form-body mx-auto shadow-lg p-3 " style="max-width: 700px; background:#eee;">
            <form action="{{ route('employees.updateprofile', $employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control bg-transparent border-secondary" name="name"
                                id="" aria-describedby="helpId" placeholder=""
                                value="{{ old('name', $employee->name) }}">
                            @error('name')
                                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control bg-transparent border-secondary" name="email"
                                id="" aria-describedby="emailHelpId" placeholder=""
                                value="{{ old('email', $employee->email) }}">
                            @error('email')
                                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Departments</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="department"
                                value="{{ old('department', $employee->department) }}">
                                <option value="Web Developer">Web Developer</option>
                                <option value="Angular Developer">Angular Developer</option>
                                <option value="React Developer">React Developer</option>
                                <option value="Graphic Designer">Graphic Designer</option>
                                <option value="IT Supporter">IT Supporter</option>
                            </select>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Designation</label>
                            <select class="form-control" id="exampleFormControlSelect2"
                                name="designation" value="{{ old('designation', $employee->type) }}">
                                <option value="1">Admin</option>
                                <option value="2">SubAdmin</option>
                                <option value="0">Employee</option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Date of Birth</label>
                            <input type="date" class="form-control bg-transparent border-secondary" name="birthday"
                                id="" aria-describedby="helpId" placeholder="" value="{{ old('birthday',$employee->birthday) }}">
                            @error('birthday')
                                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Date of Join</label>
                            <input type="date" class="form-control bg-transparent border-secondary" name="dob"
                                id="" aria-describedby="helpId" placeholder="" value="{{ old('dob',$employee->dob) }}">
                            @error('dob')
                                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Basic Salary</label>
                            <input type="text" class="form-control bg-transparent border-secondary"
                                name="basic_salary" id="" aria-describedby="helpId" placeholder=""
                                value="{{ old('basic_salary',$employee->basic_salary) }}">
                            @error('basic_salary')
                                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">File upload</label>
                            <input type="file" class="form-control bg-transparent border-secondary" name="image"
                                id="" aria-describedby="emailHelpId" placeholder="" alue="{{ old('image') }}">
                            @if ($employee->image != '' && file_exists(public_path() . '/upload/employees/' . $employee->image))
                                <img src="{{ url('/upload/employees/' . $employee->image) }}" width="100"
                                    height="100" alt="">
                            @else
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control bg-transparent border-secondary" name="address"
                                id="" placeholder="" value="{{ old('address', $employee->address) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@extends('layouts.footer')
