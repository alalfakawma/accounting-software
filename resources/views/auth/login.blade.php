@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column"></div>
        <div class="column"></div>
        <div class="column">
            <div class="title is-5 has-text-centered">LOGIN</div>

            @if ($errors->any())
                <div class="help is-danger has-text-centered m-b-20 has-text-weight-bold">These credentials do not match our records.</div>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="field">
                  <div class="control">
                    <input class="input is-small" type="email" name="email" placeholder="Email" autofocus required>
                  </div>
                </div>

                <div class="field">
                  <div class="control">
                    <input class="input is-small" type="password" name="password" placeholder="Password" required>
                  </div>
                </div>

                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            Remember me?
                        </label>
                    </div>
                </div>

                <div class="field has-text-centered">
                    <button type="submit" class="button is-small is-success">Login</button>
                </div>

                <div class="field has-text-centered">
                    <a href="{{ route('password.request') }}" class="help has-text-grey-light">Forgot password?</a>
                </div>
            </form>
        </div>
        <div class="column"></div>
        <div class="column"></div>
    </div>
</div>
@endsection
