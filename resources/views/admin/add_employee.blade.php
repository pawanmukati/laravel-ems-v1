<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="header py-5 d-flex align-items-center justify-content-between">
            <h4>Employees</h4>
            <a href="{{ route('employees.index') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="form-body mx-auto shadow-lg p-3 " style="max-width: 700px; background:#eee;">
            <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control bg-transparent border-secondary" name="name"
                                id="" aria-describedby="helpId" placeholder="" value="{{ old('name') }}">
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
                                value="{{ old('email') }}">
                            @error('email')
                                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Date of Birth</label>
                            <input type="date" class="form-control bg-transparent border-secondary" name="birthday"
                                id="" aria-describedby="helpId" placeholder="" value="{{ old('birthday') }}">
                            @error('birthday')
                                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control bg-transparent border-secondary" name="password"
                                id="" aria-describedby="helpId" placeholder="" value="{{ old('password') }}">
                            @error('password')
                                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Departments</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="department">
                                <option value="Web Developer">Web Developer</option>
                                <option value="Angular Developer">Angular Developer</option>
                                <option value="React Developer">React Developer</option>
                                <option value="Graphic Designer">Graphic Designer</option>
                                <option value="IT Supporter">IT Supporter</option>
                            </select>
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Designation</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="designation">
                                <option value="1">Admin</option>
                                <option value="2">SubAdmin</option>
                                <option value="0">Employee</option>
                            </select>
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Basic Salary</label>
                            <input type="text" class="form-control bg-transparent border-secondary"
                                name="basic_salary" id="" aria-describedby="helpId" placeholder=""
                                value="{{ old('basic_salary') }}">
                            @error('basic_salary')
                                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Date of Join</label>
                            <input type="date" class="form-control bg-transparent border-secondary" name="dob"
                                id="" aria-describedby="helpId" placeholder="" value="{{ old('dob') }}">
                            @error('dob')
                                <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">File upload</label>
                            <input type="file" class="form-control bg-transparent border-secondary" name="image"
                                id="" aria-describedby="emailHelpId" placeholder=""
                                alue="{{ old('image') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea class="form-control bg-transparent border-secondary" value="{{ old('address') }}" name="address"
                                id="" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary mx-auto d-block px-5">Submit</button>
                    </div>
            </form>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
