@extends('layouts.app')

@section('content')
    <form action="{{ route('employeesStore') }}" method="post">
        @include("users._partials.form")
    </form>
@endsection
