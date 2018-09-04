@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column"></div>
        <div class="column"></div>
        <div class="column">
            <div class="title is-5 has-text-centered">RESET PASSWORD</div>

            <form action="{{ route('password.request') }}" method="post">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="field">
                  <div class="control">
                        <input class="input" type="email" name="email" placeholder="Email" autofocus required value="{{ $email ?? old('email') }}">
                  </div>

                  @if ($errors->has('email'))
                        <div class="help is-danger m-t-10 has-text-centered">{{ $errors->first('email') }}</div>
                  @endif
                </div>

                <div class="field">
                  <div class="control">
                        <input class="input" type="password" name="password" placeholder="Password" required>
                  </div>
                </div>

                <div class="field">
                  <div class="control">
                        <input class="input" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                  </div>
                </div>

                @if ($errors->has('password'))
                    <small class="help is-danger">{{ $errors->first('password') }}</small>
                @endif

                <div class="field has-text-centered">
                    <button type="submit" class="button is-warning">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
        <div class="column"></div>
        <div class="column"></div>
    </div>
</div>
@endsection
