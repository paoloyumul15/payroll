@extends('layouts.app')

@section('content')
    @include('users._partials.menu')
    <div class="columns is-multiline">
        @foreach ($users as $user)
            <div class="column is-3">
                @include('users._partials.employee-tile', [
                    'user' => $user,
                ])
            </div>
        @endforeach
    </div>
@endsection
