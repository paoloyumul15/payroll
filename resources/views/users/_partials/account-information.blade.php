<h5 class="subtitle is-6">Account Information</h5>
<div class="box">
    <div class="columns">
        <div class="column is-3">
            <div class="field">
                <label class="label" for="email">Email Address</label>
                <p class="control">
                    <input class="input is-small" id="email" name="email" value="{{ $user->email or '' }}">
                </p>
            </div>
        </div>
        <div class="column is-3">
            <div class="field">
                <label class="label" for="password">Password</label>
                <p class="control">
                    <input type="password" class="input is-small" id="password" name="password">
                </p>
            </div>
        </div>
        <div class="column is-3">
            <div class="field">
                <label class="label" for="confirm_password">Confirm Password</label>
                <p class="control">
                    <input type="password" class="input is-small" id="confirm_password" name="confirm_password">
                </p>
            </div>
        </div>
        <div class="column is-3">
            <div class="field">
                <label class="label" for="type">User Type</label>
                <p class="control">
                    <select class="input is-small" id="type" name="type" value="{{ $user->type or '' }}">
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
</div>
