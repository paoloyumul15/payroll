@extends('layouts.app')

@section('content')
    <a href="{{ route('schedulesIndex') }}">Home</a>
    <form action="/schedules" method="POST">
        {{ csrf_field() }}
        <div>
            <label for="monday">Monday</label>
            <input type="time" name="monday[start]">
            <input type="time" name="monday[end]">
        </div>
        <div>
            <label for="tuesday">Tuesday</label>
            <input type="time" name="tuesday[start]">
            <input type="time" name="tuesday[end]">
        </div>
        <div>
            <label for="wednesday">Wednesday</label>
            <input type="time" name="wednesday[start]">
            <input type="time" name="wednesday[end]">
        </div>
        <div>
            <label for="thursday">Thursday</label>
            <input type="time" name="thursday[start]">
            <input type="time" name="thursday[end]">
        </div>
        <div>
            <label for="friday">Friday</label>
            <input type="time" name="friday[start]">
            <input type="time" name="friday[end]">
        </div>
        <div>
            <label for="saturday">Saturday</label>
            <input type="time" name="saturday[start]">
            <input type="time" name="saturday[end]">
        </div>
        <div>
            <label for="sunday">Sunday</label>
            <input type="time" name="sunday[start]">
            <input type="time" name="sunday[end]">
        </div>
        <input type="submit">
    </form>
@endsection
