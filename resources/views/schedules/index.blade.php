@extends('layouts.app')

@section('content')
    <a href="{{ route('schedulesCreate') }}">Add new Schedule</a>
    @foreach($schedules as $schedule)
        {{ $schedule->id }}
    @endforeach
@endsection
