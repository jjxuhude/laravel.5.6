@extends('layouts.frontend.app')

@section('content')
<div class="container">
	@component('frontend.common.alert')
		<strong>Whoops!</strong> Something went wrong!
	@endcomponent;
</div>
@endsection
