@extends('layouts.app')

@section('content')
    @include('users._partials.menu')
    <form action="{{ route('employeesStore') }}" method="post">
        @include("users._partials.form")
    </form>
@endsection
