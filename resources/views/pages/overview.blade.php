@extends('layouts.app')

@section('content')
<div class="container">
    <div class="has-text-centered">
        <div class="title is-4">{{ $client->name }}</div>
        <div class="title is-6">GSTIN : {{ $client->gstin }}</div>
        <div class="title is-6">Client A/c : {{ $client->has_account ? "Active" : "Inactive" }}</div>
    </div>
    <div class="columns m-t-10">
        <div class="column"></div>
        <div class="column"></div>
        <div class="column">
            <a href="#">
                <div class="card m-t-10">
                  <div class="card-content">
                    <div class="title is-6 has-text-centered">
                        <span class="has-text-info">
                            PURCHASES
                        </span>
                    </div>
                  </div>
                </div>
            </a>
        </div>
        <div class="column">
            <a href="#">
                <div class="card m-t-10">
                  <div class="card-content">
                    <div class="title is-6 has-text-centered">
                        <span class="has-text-link">
                            SALES
                        </span>
                    </div>
                  </div>
                </div>
            </a>
        </div>
        <div class="column"></div>
        <div class="column"></div>
    </div>
</div>
@endsection
