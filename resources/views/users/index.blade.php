@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Employees</div>

                    <div class="panel-body">
                        @foreach ($users as $user)
                            <section>
                                <p>
                                    <a href="{{ $user->path()  }}">
                                        {{ $user->employee_id }}
                                    </a>
                                </p>
                                <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                            </section>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
