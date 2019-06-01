@extends('backend.master.master')
@section('content')

    <div class="container">
        <h1 class="blockquote" style="text-align: center">View Orders</h1>
        <hr>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Zone</th>
                <th>City</th>
                <th>Address</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order as $value)
                <tr>
                    <td>{{$value->first_name}} </td>
                    <td>{{$value->phone}}</td>
                    <td>{{$value->zone}} </td>
                    <td>{{$value->city}}</td>
                    <td>{{$value->address}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection