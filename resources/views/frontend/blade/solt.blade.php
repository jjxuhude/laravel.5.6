@extends('layouts.frontend.app')

@section('title')
<?php echo resolve('routeConfig')->getDocParamByControllerString(request()->route()->getAction()['controller'],'desc')?>
@endsection



@section('content')
<div class="container">
	//方式：1
	@component('frontend.common.alert',['foo'=>'bar'])
		@slot('title')
			'标题'
		@endslot;
		<strong>Whoops!</strong> Something went wrong!
	@endcomponent;
</div>
@endsection
