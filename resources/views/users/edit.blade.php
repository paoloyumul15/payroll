@extends('layouts.app')

@section('content')
    <form action="{{ route('employeesUpdate', ['user' => $user->id]) }}" method="post">
        {{ method_field('patch') }}
        @include("users._partials.form", [
            'user' => $user,
            'buttonText' => 'Update Profile',
        ])
    </form>
@endsection
