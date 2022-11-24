@include('layouts.sidebar')

<div class="container">
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card mx-auto" style="max-width: 850px">
                <div class="card-header"><strong>Leave Form</strong> </div>
                <div class="card-body card-block">
                    <form action="{{ route('leave.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label class=" form-control-label">Leave Type</label>
                        <select name="leave_type" required class="form-control">
                            <option value="">Select Leave</option>
                            <option value="Casual Leave">Casual Leave</option>
                            <option value="Sick Leave/Medical Leave">Sick Leave/Medical Leave</option>
                            <option value="Maternity Leave">Maternity Leave</option>
                            <option value="Half-day leave">Half-day leave</option>
                            <option value="One-day leave">One-day leave</option>

                        </select>
                        <div class="form-group">
                            <label class=" form-control-label">Form date</label>
                            <input type="date" name="leave_from" id="toDate" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">To Date</label>
                            <input type="date" id="fromDate" name="leave_to" class="form-control currunetdate"
                                required>
                        </div>
                        <script>
                            var todayDate = new Date();
                            var month = todayDate.getMonth() + 1;
                            var year = todayDate.getUTCFullYear();
                            var tdate = todayDate.getDate();
                            if (month < 10) {
                                month = "0" + month
                            }
                            if (tdate < 10) {
                                tdate = "0" + tdate;
                            }
                            var toDate = year + "-" + month + "-" + tdate;
                            var fromDate = year + "-" + month + "-" + tdate;
                            document.getElementById("toDate").setAttribute("min", toDate);
                            document.getElementById("fromDate").setAttribute("min", fromDate);
                            console.log(toDate, fromDate);
                        </script>
                        <div class="form-group">
                            <label class=" form-control-label">Requested Days</label>
                            <input type="text" name="requested_days" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class=" form-control-label">Leave Description</label>
                            <input type="text" name="leave_description" class="form-control">
                        </div>

                        <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                            <span id="payment-button-amount">Submit</span>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@extends('layouts.footer')
