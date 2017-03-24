@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('employeesStore') }}" method="post">
                            @include("users._partials.form")
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
