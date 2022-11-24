@include('layouts.sidebar')

<div class="container">
    <div id="Details" class="mt-5 mb-3">
        <h3 class="mb-2">Leave Approve</h3>
        {{-- <a href="{{ route('employees.applyleave') }}" class="btn btn-primary">Apply Leave</a> --}}
        <table width="100%" class="mt-4 table-hover table-info shadow-lg p-2">
            <tr align="center">
                <th class="p-2">S.No</th>
                <th class="p-2">Leave Type</th>
                <th class="p-2">From Date</th>
                <th class="p-2">To Date</th>
                <th class="p-2">Requested Days</th>
                <th class="p-2">Description</th>
                <th class="p-2">Comments</th>
                <th class="p-2">Current Status</th>
                <th class="p-2">Update</th>
            </tr>
            {{-- @if ($leaves->isNotEmpty()) --}}
            @php $i=1 @endphp
            @foreach ($leaves as $leave)
                <tr align="center">
                    <td class="p-2">{{ $i }}</td>
                    <td class="p-2">{{ $leave->leave_type }}</td>
                    <td class="p-2">{{ $leave->leave_from }}</td>
                    <td class="p-2">{{ $leave->leave_to }}</td>
                    <td class="p-2">{{ $leave->requested_days }}</td>
                    <td class="p-2">{{ $leave->leave_description }}</td>
                    <td class="p-2">
                        {{ $leave->oa_remark }}
                    </td>
                    <td class="p-2">
                        <form action="{{ route('employees.leaveUpdateStatus', $leave->id) }}"
                            method="POST">
                            @csrf
                            @method('put')
                            <select id="updateStatus" name="leave_status"
                                onchange="update_leave_status('{{ $leave->id }}',this.options[this.selectedIndex].value),
                                        // this.form.submit()
                                        ">
                                @if ($leave->leave_status == 1)
                                    <option id="" value="">Pending</option>
                                @elseif ($leave->leave_status == 2)
                                    <option id="" value="">Approve</option>
                                @elseif ($leave->leave_status == 0)
                                    <option id="" value="">Reject</option>
                                @endif
                                <option value="1">Pending</option>
                                <option value="2">Approve</option>
                                <option value="0">Reject</option>
                            </select>
                        </form>
                        <div class="modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Modal title</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('employees.leaveUpdateStatus', $leave->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('put')
                                            <input type="text" name='reason'>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->


                        <script>
                            function update_leave_status(id,select_value){
                               let reason = '';
                               if(select_value === 0){
                                  reason = prompt("Please enter the reason");
                               }
                            //    window.location.href='http://127.0.0.1:8000/leaveUpdate?id='+id+'&type=update&status='+select_value+'&remark='+reason;
                            }
                         </script>

                    </td>
                    <td class="p-2">
                        @if ($leave->leave_status == 1)
                            <button type="button" class="btn btn-xs btn-warning  ml-1"data-toggle="modal"
                                data-target="#myModalDelete">Pending</button>
                        @elseif ($leave->leave_status == 2)
                            <button type="button" class="btn btn-xs btn-success" data-toggle="modal"
                                data-target="#myModalUpdate">Approve</button>
                        @else
                            <button type="button" class="btn btn-xs btn-danger ml-1"data-toggle="modal"
                                data-target="#myModalDelete">Reject</button>
                        @endif
                    </td>

                </tr>
                @php $i++ @endphp
            @endforeach
            {{-- @else{
                <td colspan="6">Record not found</td>
                }
            @endif --}}
        </table>
    </div>

</div>

@extends('layouts.footer')
