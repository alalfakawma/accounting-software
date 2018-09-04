@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column"></div>
        <div class="column"></div>
        <div class="column">
            <div class="title is-5 has-text-centered">REGISTER</div>

            <form action="{{ route('register') }}" method="post">
                @csrf

                <div class="field">
                  <div class="control">
                    <input class="input is-small" type="text" name="name" placeholder="Name" autofocus required value="{{ old('name') }}">
                  </div>

                  @if ($errors->has('name'))
                      <div class="help is-danger m-t-10">{{ $errors->first('name') }}</div>
                  @endif
                </div>

                <div class="field">
                  <div class="control">
                    <input class="input is-small" type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                  </div>

                  @if ($errors->has('email'))
                    <div class="help is-danger m-t-10">{{ $errors->first('email') }}</div>
                  @endif
                </div>

                <div class="field">
                  <div class="control">
                    <input class="input is-small" type="password" name="password" placeholder="Password" required>
                  </div>
                </div>

                <div class="field">
                  <div class="control">
                    <input class="input is-small" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                  </div>
                </div>

                @if ($errors->has('password'))
                      <div class="help is-danger m-b-10">{{ $errors->first('password') }}</div>
                  @endif

                <div class="field has-text-centered">
                    <button type="submit" class="button is-small is-success">Register</button>
                </div>
            </form>
        </div>
        <div class="column"></div>
        <div class="column"></div>
    </div>
</div>
@endsection
