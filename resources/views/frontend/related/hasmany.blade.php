@extends('layouts.frontend.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <?php
                        array_map(function ($post){
                            print_r($post);
                        },$user->posts->toArray())
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
