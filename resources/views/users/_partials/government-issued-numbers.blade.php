<h5 class="subtitle is-6">ID's, Government Issued Numbers</h5>
<div class="box">
    <div class="columns is-multiline">
        <div class="column is-3">
            <div class="field">
                <label class="label" for="sss_number">SSS Number</label>
                <p class="control">
                    <input class="input is-small" id="sss_number" name="sss_number" value="{{ $user->profile->sss_number or '' }}">
                </p>
            </div>
        </div>
        <div class="column is-3">
            <div class="field">
                <label class="label" for="phil_health_number">PhilHealth Number</label>
                <p class="control">
                    <input class="input is-small" id="phil_health_number" name="phil_health_number" value="{{ $user->profile->phil_health_number or '' }}">
                </p>
            </div>
        </div>
        <div class="column is-3">
            <div class="field">
                <label class="label" for="pagibig_number">PagIbig Number</label>
                <p class="control">
                    <input class="input is-small" id="pagibig_number" name="pagibig_number" value="{{ $user->profile->pagibig_number or '' }}">
                </p>
            </div>
        </div>
        <div class="column is-3">
            <div class="field">
                <label class="label" for="tin_number">TIN Number</label>
                <p class="control">
                    <input class="input is-small" id="tin_number" name="tin_number" value="{{ $user->profile->tin_number or '' }}">
                </p>
            </div>
        </div>
        <div class="column is-3">
            <div class="field">
                <label class="label" for="account_number">Account Number</label>
                <p class="control">
                    <input class="input is-small" id="account_number" name="account_number" value="{{ $user->profile->account_number or '' }}">
                </p>
            </div>
        </div>
        <div class="column is-3">
            <div class="field">
                <label class="label" for="employee_id">Employee ID</label>
                <p class="control">
                    <input class="input is-small" id="employee_id" name="employee_id" value="{{ $user->employee_id or '' }}">
                </p>
            </div>
        </div>
    </div>
</div>
