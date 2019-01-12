@extends('layouts.app')

@section('table_style')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Client Information Table</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table>
                        <tr>
                                <th>Client's Name</th>  
                                <th>Entity</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Email</th>                                
                                <th>Action</th>
                        </tr>
                        @foreach($clients as $client)
                        @if($client->is_deleted == FALSE)
                            <tr>
                                <td>{{$client->client_name}}</td>
                                <td>{{$client->entity}}</td>
                                <td>{{$client->address}}</td>
                                <td>{{$client->contact}}</td>   
                                <td>{{$client->email}}</td>                                   
                                <td style="text-align:center">
                                    <a href="{{ route('delete', ['id' => Crypt::encrypt($client->id)]) }}" class="btn btn-danger">Delete</a>
                                    <a href="{{ route('edit', ['id' => Crypt::encrypt($client->id)])}}" class="btn btn-info">Edit</a>    
                                </td>
                            </tr>
                        @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
