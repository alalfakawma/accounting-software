@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="columns">
			<div class="column"></div>
			<div class="column">
				<a href="{{ route('clients') }}">
				    <div class="card m-t-10">
				      <div class="card-content">
				        <div class="title is-6 has-text-centered">
				            <span class="has-text-gray">
								<i class="fa fa-users"></i> CLIENTS
				            </span>
				        </div>
				      </div>
				    </div>
				</a>
				<div class="columns m-t-10">
					<div class="column">
						<a href="{{ route('add-purchase') }}">
						    <div class="card m-t-10">
						      <div class="card-content">
						        <div class="title is-6 has-text-centered">
						            <span class="has-text-info">
										<i class="fa fa-plus"></i> PURCHASE
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
										<i class="fa fa-plus"></i> SALE
						            </span>
						        </div>
						      </div>
						    </div>
						</a>
					</div>
				</div>
			</div>
			<div class="column"></div>
		</div>
	</div>
@endsection