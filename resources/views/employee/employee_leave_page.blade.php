@include('layouts.sidebar')

<div class="container">
    <div id="Details" class="mt-5 mb-3">
        <h3 class="mb-2">Leave Approve</h3>
        <a href="{{ route('employees.applyleave') }}" class="btn btn-primary">Apply Leave</a>
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
            </tr>
            {{-- @if ($leaves->isNotEmpty()) --}}
            @php $i=1 @endphp
            @foreach ($leaves as $leave)
                <tr align="center">
                    <td class="p-2">{{ $i}}</td>
                   <td class="p-2">{{ $leave->leave_type }}</td>
                    <td class="p-2">{{ $leave->leave_from }}</td>
                    <td class="p-2">{{ $leave->leave_to }}</td>
                    <td class="p-2">{{ $leave->requested_days }}</td>
                    <td class="p-2">{{ $leave->leave_description }}</td>
                    <td class="p-2">
                        {{ $leave->oa_remark }}
                    </td>
                    <td class="p-2">
                        @if($leave->leave_status == 1)
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
