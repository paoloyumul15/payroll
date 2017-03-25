{{ csrf_field() }}
@include('users._partials.personal-information')
@include('users._partials.contact-information')
@include('users._partials.government-issued-numbers')
@include('users._partials.account-information')
<button class="button is-primary" type="submit">{{ $buttonText or 'Add Employee' }}</button>
