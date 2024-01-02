@extends('layouts.app')

@section('content')
<div id="list-user" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('List User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('website.user.datatable')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection