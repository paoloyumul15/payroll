@extends('layouts.app')

@section('content')
<div class="columns">
    <div class="column is-one-third is-offset-one-third">
        <article class="message">
            <div class="message-header">
                <p>Login</p>
            </div>
            <div class="message-body">
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="columns">
                        <div class="column is-12">
                            <div class="field">
                                <label class="label">Email</label>
                                <p class="control has-icon">
                                    <input class="input" type="text" name="email">
                                    <span class="icon is-small">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </p>
                                @if ($errors->has('email'))
                                    <span class="help is-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="field">
                                <label class="label">Password</label>
                                <p class="control has-icon">
                                    <input class="input" type="password" name="password">
                                    <span class="icon is-small">
                                        <i class="fa fa-key"></i>
                                    </span>
                                </p>
                                @if ($errors->has('password'))
                                    <span class="help is-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="field">
                                <button type="submit" class="button is-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </article>
    </div>
</div>
@endsection
