
    @include('layouts.sidebar')

    <div class="container">
        {{-- <a href="{{ route('logout') }}" class="mt-5 ml-2 btn btn-dark float-right">Logout</a> --}}
        <div class="header py-3 mt-4 d-flex align-items-center justify-content-between">
            <h4>Employees</h4>
            <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employees</a>
        </div>

        <div class="table-body">
            <table width="100%" class=" table-hover table-info shadow-lg">
                <thead>
                    <tr align="center">
                        <th class="p-2" scope="row">ID</th>
                        <th class="p-2">Image</th>
                        <th class="p-2">Name</th>
                        <th class="p-2">Department</th>
                        <th class="p-2">Designation</th>
                        <th class="p-2">Email</th>
                        <th class="p-2">Address</th>
                        <th class="p-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @if ($employees->isNotEmpty())
                        @foreach ($employees as $employee)
                            <tr align="center">
                                <td class="p-2" scope="row">{{ $i }}</td>
                                <td class="p-2">
                                    @if ($employee->image != '' && file_exists(public_path() . '/upload/employees/' . $employee->image))
                                        <img class="rounded-circle"
                                            src="{{ url('/upload/employees/' . $employee->image) }}" width="50"
                                            height="50" alt="">
                                    @else
                                    @endif
                                </td>
                                <td class="p-2">{{ $employee->name }}</td>
                                <td class="p-2">{{ $employee->department }}</th>
                                <td class="p-2">
                                   {{-- @if ($employee->type == 1) --}}
                                   {{ $employee->type }}
                                   {{-- @elseif ($employee->type == "2") --}}
                                   {{-- {{ "Subadmin" }} --}}
                                   {{-- @elseif ($employee->type == "0") --}}
                                   {{-- {{ "Employee" }} --}}
                                   {{-- @endif --}}
                                </td>
                                <td class="p-2">{{ $employee->email }}</td>
                                <td class="p-2">{{ $employee->address }}</td>
                                <td class="p-2">
                                    <a href="{{ route('employees.edit', $employee->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" onclick="deleteEmployee({{ $employee->id }})"
                                        class="btn btn-danger btn-sm">Delete</a>
                                    <form id="employee-edit-action-{{ $employee->id }}"
                                        action="{{ route('employees.destroy', $employee->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <script>
                                        function deleteEmployee(id) {
                                            if (confirm("Are you sure you want to delete this Record ?")) {
                                                document.getElementById('employee-edit-action-' + id).submit();
                                            }
                                        }
                                    </script>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    @else{
                        <td colspan="6">Record not found</td>
                        }
                    @endif
                </tbody>
            </table>
            <div class="pagination mt-3">
                {{ $employees->links() }}
            </div>
        </div>
    </div>
    @extends('layouts.footer')
