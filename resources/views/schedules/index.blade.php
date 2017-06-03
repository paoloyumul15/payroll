@extends('layouts.app')

@section('content')
    <a href="{{ route('schedulesCreate') }}">Add new Schedule</a>
    <ul>
        @foreach($schedules as $schedule)
            <li>{{ $schedule->id }}</li>
        @endforeach
    </ul>
@endsection
