@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Client Application Form') }}</div>

                <div class="card-body">
                   <h5>Client information successfully added!</h5>
                   <a href="{{ route('landing') }}">Go back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
