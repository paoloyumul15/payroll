{{ csrf_field() }}
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="employee_id">Employee ID</label>
            <input class="form-control input-sm" id="employee_id" name="employee_id" value="{{ $user->employee_id or '' }}">
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input class="form-control input-sm" id="first_name" name="first_name" value="{{ $user->first_name or '' }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="middle_name">Middle Name</label>
            <input class="form-control input-sm" id="middle_name" name="middle_name" value="{{ $user->middle_name or '' }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input class="form-control input-sm" id="last_name" name="last_name" value="{{ $user->last_name or '' }}">
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
                @if(isset($user))
                    <option value="M" @if($user->profile->gender == 'M') selected @endif>Male</option>
                    <option value="F" @if($user->profile->gender == 'M') selected @endif>Female</option>
                @endif
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="age">Age</label>
            <input class="form-control input-sm" id="age" name="age" value="{{ $user->profile->age or '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="birth_date">Birth Date</label>
            <input type="date" class="form-control input-sm" id="birth_date" name="birth_date" value="{{ $user->profile->birth_date or '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="place_of_birth">Place of Birth</label>
            <input class="form-control input-sm" id="place_of_birth" name="place_of_birth" value="{{ $user->profile->place_of_birth or '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="civil_status">Civil Status</label>
            <select class="form-control input-sm" name="civil_status" id="civil_status">
                <option value="">Choose</option>
                @foreach (config('qsjpayroll.maritalStatuses') as $code => $civilStatus)
                    @if(isset($user))
                        <option value="{{ $code }}" @if($user->profile->civil_status == $code) selected @endif>{{ $civilStatus }}</option>
                    @else
                        <option value="{{ $code }}">{{ $civilStatus }}</option>
                    @endif

                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="date_hired">Date Hired</label>
            <input type="date" class="form-control input-sm" id="date_hired" name="date_hired" value="{{ $user->profile->date_hired or '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="date_end">Date End</label>
            <input type="date" class="form-control input-sm" id="date_end" name="date_end" value="{{ $user->profile->date_end or '' }}">
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="address">Address</label>
            <input class="form-control input-sm" id="address" name="address" value="{{ $user->profile->address or '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="telephone_number">Telephone Number</label>
            <input class="form-control input-sm" id="telephone_number" name="telephone_number" value="{{ $user->profile->telephone_number or '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="mobile_number">Mobile Number</label>
            <input class="form-control input-sm" id="mobile_number" name="mobile_number" value="{{ $user->profile->mobile_number or '' }}">
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="sss_number">SSS Number</label>
            <input class="form-control input-sm" id="sss_number" name="sss_number" value="{{ $user->profile->sss_number or '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="phil_health_number">PhilHealth Number</label>
            <input class="form-control input-sm" id="phil_health_number" name="phil_health_number" value="{{ $user->profile->phil_health_number or '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="pagibig_number">PagIbig Number</label>
            <input class="form-control input-sm" id="pagibig_number" name="pagibig_number" value="{{ $user->profile->pagibig_number or '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="tin_number">TIN Number</label>
            <input class="form-control input-sm" id="tin_number" name="tin_number" value="{{ $user->profile->tin_number or '' }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="account_number">Account Number</label>
            <input class="form-control input-sm" id="account_number" name="account_number" value="{{ $user->profile->account_number or '' }}">
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="email">Email Address</label>
            <input class="form-control input-sm" id="email" name="email" value="{{ $user->email or '' }}">
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
<button class="btn btn-primary btn-sm" type="submit">{{ $buttonText or 'Add Employee' }}</button>
