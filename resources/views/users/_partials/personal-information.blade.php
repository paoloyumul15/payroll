<h5 class="subtitle is-6">Personal Information</h5>
<div class="box">
    <div class="columns is-multiline">
        <div class="column is-3">
            <div class="field">
                <label class="label" for="first_name">First Name</label>
                <p class="control">
                    <input class="input is-small" id="first_name" name="first_name" value="{{ $user->first_name or '' }}">
                </p>
            </div>
        </div>
        <div class="column is-3">
            <div class="field">
                <label class="label" for="middle_name">Middle Name</label>
                <p class="control">
                    <input class="input is-small" id="middle_name" name="middle_name" value="{{ $user->middle_name or '' }}">
                </p>
            </div>
        </div>
        <div class="column is-3">
            <div class="field">
                <label class="label" for="last_name">Last Name</label>
                <p class="control">
                    <input class="input is-small" id="last_name" name="last_name" value="{{ $user->last_name or '' }}">
                </p>
            </div>
        </div>
        <div class="column is-3">
            <div class="field">
                <label class="label" for="gender">Gender</label>
                <select class="input is-small" name="gender" id="gender">
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
                    <input class="input is-small" id="age" name="age" value="{{ $user->profile->age or '' }}">
                </p>
            </div>
        </div>
        <div class="column is-3">
            <div class="field">
                <label class="label" for="birth_date">Birth Date</label>
                <p class="control">
                    <input type="date" class="input is-small" id="birth_date" name="birth_date" value="{{ $user->profile->birth_date or '' }}">
                </p>
            </div>
        </div>
        <div class="column is-3">
            <div class="field">
                <label class="label" for="place_of_birth">Place of Birth</label>
                <p class="control">
                    <input class="input is-small" id="place_of_birth" name="place_of_birth" value="{{ $user->profile->place_of_birth or '' }}">
                </p>
            </div>
        </div>
        <div class="column is-3">
            <div class="field">
                <label class="label" for="civil_status">Civil Status</label>
                <p class="control">
                    <select class="input is-small" name="civil_status" id="civil_status">
                        <option value="">Choose</option>
                        @foreach (config('esweldo.maritalStatuses') as $code => $civilStatus)
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
                    <input type="date" class="input is-small" id="date_hired" name="date_hired" value="{{ $user->profile->date_hired or '' }}">
                </p>
            </div>
        </div>
        <div class="column is-3">
            <div class="field">
                <label class="label" for="date_end">Date End</label>
                <p class="control">
                    <input type="date" class="input is-small" id="date_end" name="date_end" value="{{ $user->profile->date_end or '' }}">
                </p>
            </div>
        </div>
    </div>
</div>
