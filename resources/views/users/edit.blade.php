@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('employeesUpdate', ['user' => $user->id]) }}" method="post">
                            {{ method_field('patch') }}
                            @include("users._partials.form", [
                                'user' => $user,
                                'buttonText' => 'Update Profile',
                            ])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
