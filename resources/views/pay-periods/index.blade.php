@extends('layouts.app')

@section('content')
    <div class="columns">
        <div class="column is-8">
            @foreach($payPeriods as $payPeriod)
                <div class="columns">
                    <div class="column is-12">
                        <div class="box">
                            <p>Start Date: {{ $payPeriod->start_date->format('M d, Y') }}</p>
                            <p>End Date: {{ $payPeriod->end_date->format('M d, Y') }}</p>
                            <p>Pay Out Date: {{ $payPeriod->pay_out_date->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            @if(! count($payPeriods))
                <div class="columns">
                    <div class="column is-12">
                        <div class="box">
                            No Pay Period exists.
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @include('pay-periods._partials.form')
    </div>
@endsection
