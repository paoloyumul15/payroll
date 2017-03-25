<h5 class="subtitle is-6">Contact Information</h5>
<div class="box">
    <div class="columns">
        <div class="column is-6">
            <div class="field">
                <label class="label" for="address">Address</label>
                <p class="control">
                    <input class="input is-small" id="address" name="address" value="{{ $user->profile->address or '' }}">
                </p>
            </div>
        </div>
        <div class="column is-3">
            <div class="field">
                <label class="label" for="telephone_number">Telephone Number</label>
                <p class="control">
                    <input class="input is-small" id="telephone_number" name="telephone_number" value="{{ $user->profile->telephone_number or '' }}">
                </p>
            </div>
        </div>
        <div class="column is-3">
            <div class="field">
                <label class="label" for="mobile_number">Mobile Number</label>
                <p class="control">
                    <input class="input is-small" id="mobile_number" name="mobile_number" value="{{ $user->profile->mobile_number or '' }}">
                </p>
            </div>
        </div>
    </div>
</div>
