@extends('layouts.app')

@section('content')
    @foreach($schedules as $schedule)
        {{ $schedule->id }}
    @endforeach
@endsection
