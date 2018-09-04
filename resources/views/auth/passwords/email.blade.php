@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column"></div>
        <div class="column"></div>
        <div class="column">
            <div class="title is-5 has-text-centered">RESET PASSWORD</div>

            <form action="{{ route('password.email') }}" method="post">
                @csrf

                <div class="field">
                  <div class="control">
                        <input class="input" type="email" name="email" placeholder="Email" autofocus required>
                  </div>

                  @if ($errors->has('email'))
                        <div class="help is-danger m-t-10 has-text-centered">{{ $errors->first('email') }}</div>
                  @endif
                </div>

                <div class="field has-text-centered">
                    <button type="submit" class="button is-warning">
                        Send Password Reset Link
                    </button>
                </div>
            </form>
        </div>
        <div class="column"></div>
        <div class="column"></div>
    </div>
</div>
@endsection