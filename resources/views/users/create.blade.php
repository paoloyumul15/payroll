@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Employee</div>

                    <div class="panel-body">
                        <form action="/employees" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="employee_id">Employee ID</label>
                                        <input class="form-control input-sm" id="employee_id" name="employee_id">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input class="form-control input-sm" id="first_name" name="first_name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="middle_name">Middle Name</label>
                                        <input class="form-control input-sm" id="middle_name" name="middle_name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input class="form-control input-sm" id="last_name" name="last_name">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control input-sm" name="gender" id="gender">
                                            <option value="">Choose</option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input class="form-control input-sm" id="age" name="age">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="birth_date">Birth Date</label>
                                        <input type="date" class="form-control input-sm" id="birth_date" name="birth_date">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="place_of_birth">Place of Birth</label>
                                        <input class="form-control input-sm" id="place_of_birth" name="place_of_birth">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="civil_status">Civil Status</label>
                                        <select class="form-control input-sm" name="civil_status" id="civil_status">
                                            <option value="">Choose</option>
                                            @foreach (config('qsjpayroll.maritalStatuses') as $code => $civilStatus)
                                                <option value="{{ $code }}">{{ $civilStatus }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="date_hired">Date Hired</label>
                                        <input type="date" class="form-control input-sm" id="date_hired" name="date_hired">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="date_end">Date End</label>
                                        <input type="date" class="form-control input-sm" id="date_end" name="date_end">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input class="form-control input-sm" id="address" name="address">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="telephone_number">Telephone Number</label>
                                        <input class="form-control input-sm" id="telephone_number" name="telephone_number">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="mobile_number">Mobile Number</label>
                                        <input class="form-control input-sm" id="mobile_number" name="mobile_number">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="sss_number">SSS Number</label>
                                        <input class="form-control input-sm" id="sss_number" name="sss_number">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="phil_health_number">PhilHealth Number</label>
                                        <input class="form-control input-sm" id="phil_health_number" name="phil_health_number">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="pagibig_number">PagIbig Number</label>
                                        <input class="form-control input-sm" id="pagibig_number" name="pagibig_number">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tin_number">TIN Number</label>
                                        <input class="form-control input-sm" id="tin_number" name="tin_number">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="account_number">Account Number</label>
                                        <input class="form-control input-sm" id="account_number" name="account_number">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input class="form-control input-sm" id="email" name="email">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control input-sm" id="password" name="password">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" class="form-control input-sm" id="confirm_password" name="confirm_password">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
