@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Client Update Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updateClient') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Client Name') }}</label>

                            <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value=" @foreach($array as $column) {{$column->client_name }}  @endforeach"  required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="entity" class="col-md-4 col-form-label text-md-right">{{ __('Name of Entity') }}</label>

                            <div class="col-md-6">
                                <input id="entity" type="text" class="form-control" name="entity" value="@foreach($array as $column) {{$column->entity }}  @endforeach"  required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="@foreach($array as $column) {{$column->email }}  @endforeach"  required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address"  value="@foreach($array as $column) {{$column->address }}  @endforeach" required>
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact #') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control" name="contact" value="@foreach($array as $column){{$column->contact}} @endforeach" required>
                            </div>
                        </div>
                        

                        @foreach($array as $column)
                            @php
                                $hide = Crypt::encrypt($column->id);
                            @endphp
                        @endforeach

                        <input id="id" type="hidden" name="id" value="{{$hide}}">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Update Client Info') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
