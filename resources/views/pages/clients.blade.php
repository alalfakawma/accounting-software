@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="title is-4 has-text-centered">
			CLIENTS
		</div>
		{{-- CONVERT TO VUE COMPONENT --}}
		<div>
			~~~~~~~~~ SEARCH BAR
		</div>
		<table class="table is-fullwidth">
			<thead>
				<tr>
					<th>Client Name</th>
					<th>GSTIN</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($clients as $i => $client)
					<tr>
						<td>{{ $client->name }}</td>
						<td>{{ $client->gstin }}</td>
						<td>
							<a href="{{ route('overview-client', $client->slug) }}" class="button is-small is-success has-text-weight-bold">VIEW</a>
							<form action="{{ route('delete-client', $client->id) }}" class="is-hidden {{ 'client-delete' . $i }}" method="post">
								@method('DELETE')
								@csrf
							</form>
							<div @click="clientDelete('{{ 'client-delete' . $i  }}')" class="button is-small is-danger has-text-weight-bold">DELETE</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection