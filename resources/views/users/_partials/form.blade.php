{{ csrf_field() }}
<div class="columns">
    <div class="column is-4">
        <div class="field">
            <label class="label" for="employee_id">Employee ID</label>
            <p class="control">
                <input class="input" id="employee_id" name="employee_id" value="{{ $user->employee_id or '' }}">
            </p>
        </div>
    </div>
    <div class="column is-4">
        <div class="field">
            <label class="label" for="type">User Type</label>
            <p class="control">
                <select class="input" id="type" name="type" value="{{ $user->type or '' }}">
                    @if(isset($user))
                        <option value="Employee" @if($user->type == 'Employee') selected @endif>Employee</option>
                        <option value="Admin" @if($user->type == 'Admin') selected @endif>Admin</option>
                    @else
                        <option value="Employee">Employee</option>
                        <option value="Admin">Admin</option>
                    @endif
                </select>
            </p>
        </div>
    </div>
</div>
<hr>
<div class="columns">
    <div class="column is-4">
        <div class="field">
            <label class="label" for="first_name">First Name</label>
            <p class="control">
                <input class="input" id="first_name" name="first_name" value="{{ $user->first_name or '' }}">
            </p>
        </div>
    </div>
    <div class="column is-4">
        <div class="field">
            <label class="label" for="middle_name">Middle Name</label>
            <p class="control">
                <input class="input" id="middle_name" name="middle_name" value="{{ $user->middle_name or '' }}">
            </p>
        </div>
    </div>
    <div class="column is-4">
        <div class="field">
            <label class="label" for="last_name">Last Name</label>
            <p class="control">
                <input class="input" id="last_name" name="last_name" value="{{ $user->last_name or '' }}">
            </p>
        </div>
    </div>
</div>
<hr>
<div class="columns is-multiline">
    <div class="column is-3">
        <div class="field">
            <label class="label" for="gender">Gender</label>
            <select class="input" name="gender" id="gender">
                <option value="">Choose</option>
                @if(isset($user))
                    <option value="M" @if($user->profile->gender == 'M') selected @endif>Male</option>
                    <option value="F" @if($user->profile->gender == 'F') selected @endif>Female</option>
                @else
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                @endif
            </select>
        </div>
    </div>
    <div class="column is-3">
        <div class="field">
            <label class="label" for="age">Age</label>
            <p class="control">
                <input class="input" id="age" name="age" value="{{ $user->profile->age or '' }}">
            </p>
        </div>
    </div>
    <div class="column is-3">
        <div class="field">
            <label class="label" for="birth_date">Birth Date</label>
            <p class="control">
                <input type="date" class="input" id="birth_date" name="birth_date" value="{{ $user->profile->birth_date or '' }}">
            </p>
        </div>
    </div>
    <div class="column is-3">
        <div class="field">
            <label class="label" for="place_of_birth">Place of Birth</label>
            <p class="control">
                <input class="input" id="place_of_birth" name="place_of_birth" value="{{ $user->profile->place_of_birth or '' }}">
            </p>
        </div>
    </div>
    <div class="column is-3">
        <div class="field">
            <label class="label" for="civil_status">Civil Status</label>
            <p class="control">
                <select class="input" name="civil_status" id="civil_status">
                    <option value="">Choose</option>
                    @foreach (config('qsjpayroll.maritalStatuses') as $code => $civilStatus)
                        @if(isset($user))
                            <option value="{{ $code }}" @if($user->profile->civil_status == $code) selected @endif>{{ $civilStatus }}</option>
                        @else
                            <option value="{{ $code }}">{{ $civilStatus }}</option>
                        @endif
                    @endforeach
                </select>
            </p>
        </div>
    </div>
    <div class="column is-3">
        <div class="field">
            <label class="label" for="date_hired">Date Hired</label>
            <p class="control">
                <input type="date" class="input" id="date_hired" name="date_hired" value="{{ $user->profile->date_hired or '' }}">
            </p>
        </div>
    </div>
    <div class="column is-3">
        <div class="field">
            <label class="label" for="date_end">Date End</label>
            <p class="control">
                <input type="date" class="input" id="date_end" name="date_end" value="{{ $user->profile->date_end or '' }}">
            </p>
        </div>
    </div>
</div>
<hr>
<div class="columns">
    <div class="column is-6">
        <div class="field">
            <label class="label" for="address">Address</label>
            <p class="control">
                <input class="input" id="address" name="address" value="{{ $user->profile->address or '' }}">
            </p>
        </div>
    </div>
    <div class="column is-3">
        <div class="field">
            <label class="label" for="telephone_number">Telephone Number</label>
            <p class="control">
                <input class="input" id="telephone_number" name="telephone_number" value="{{ $user->profile->telephone_number or '' }}">
            </p>
        </div>
    </div>
    <div class="column is-3">
        <div class="field">
            <label class="label" for="mobile_number">Mobile Number</label>
            <p class="control">
                <input class="input" id="mobile_number" name="mobile_number" value="{{ $user->profile->mobile_number or '' }}">
            </p>
        </div>
    </div>
</div>
<hr>
<div class="columns is-multiline">
    <div class="column is-3">
        <div class="field">
            <label class="label" for="sss_number">SSS Number</label>
            <p class="control">
                <input class="input" id="sss_number" name="sss_number" value="{{ $user->profile->sss_number or '' }}">
            </p>
        </div>
    </div>
    <div class="column is-3">
        <div class="field">
            <label class="label" for="phil_health_number">PhilHealth Number</label>
            <p class="control">
                <input class="input" id="phil_health_number" name="phil_health_number" value="{{ $user->profile->phil_health_number or '' }}">
            </p>
        </div>
    </div>
    <div class="column is-3">
        <div class="field">
            <label class="label" for="pagibig_number">PagIbig Number</label>
            <p class="control">
                <input class="input" id="pagibig_number" name="pagibig_number" value="{{ $user->profile->pagibig_number or '' }}">
            </p>
        </div>
    </div>
    <div class="column is-3">
        <div class="field">
            <label class="label" for="tin_number">TIN Number</label>
            <p class="control">
                <input class="input" id="tin_number" name="tin_number" value="{{ $user->profile->tin_number or '' }}">
            </p>
        </div>
    </div>
    <div class="column is-3">
        <div class="field">
            <label class="label" for="account_number">Account Number</label>
            <p class="control">
                <input class="input" id="account_number" name="account_number" value="{{ $user->profile->account_number or '' }}">
            </p>
        </div>
    </div>
</div>
<hr>
<div class="columns">
    <div class="column is-3">
        <div class="field">
            <label class="label" for="email">Email Address</label>
            <p class="control">
                <input class="input" id="email" name="email" value="{{ $user->email or '' }}">
            </p>
        </div>
    </div>
    <div class="column is-3">
        <div class="field">
            <label class="label" for="password">Password</label>
            <p class="control">
                <input type="password" class="input" id="password" name="password">
            </p>
        </div>
    </div>
    <div class="column is-3">
        <div class="field">
            <label class="label" for="confirm_password">Confirm Password</label>
            <p class="control">
                <input type="password" class="input" id="confirm_password" name="confirm_password">
            </p>
        </div>
    </div>
</div>
<button class="button is-primary" type="submit">{{ $buttonText or 'Add Employee' }}</button>
