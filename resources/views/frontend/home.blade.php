@extends('layouts.frontend.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<?php //dump(request()->user()->toArray());?>
                    You are logged in!
                   
                    <div class="passport-clients"><passport-clients/></div>
                    <div class="passport-authorized-clients"><passport-authorized-clients/></div>
                    <div class="passport-personal-access-tokens"><passport-personal-access-tokens/></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
