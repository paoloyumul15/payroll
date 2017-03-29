<form action="{{ route('payPeriodsStore') }}" method="post" class="column is-4">
    {{ csrf_field() }}
    <div class="box">
        <div class="column is-12">
            <div class="field">
                <label class="label" for="start_date">Start Date</label>
                <p class="control">
                    <input type="date" class="input is-small" id="start_date" name="start_date">
                </p>
            </div>
        </div>
        <div class="column is-12">
            <div class="field">
                <label class="label" for="end_date">End Date</label>
                <p class="control">
                    <input type="date" class="input is-small" id="end_date" name="end_date">
                </p>
            </div>
        </div>
        <div class="column is-12">
            <div class="field">
                <label class="label" for="pay_out_date">Pay Out Date</label>
                <p class="control">
                    <input type="date" class="input is-small" id="pay_out_date" name="pay_out_date">
                </p>
            </div>
        </div>
        <div class="column is-12">
            <div class="field">
                <p class="control">
                    <button type="submit" class="button is-primary is-small">
                        Add Cut-Off
                    </button>
                </p>
            </div>
        </div>
    </div>
</form>
