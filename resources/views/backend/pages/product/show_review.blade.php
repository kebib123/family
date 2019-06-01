@extends('backend.master.master')
@section('content')

    <div class="container">
        <h1 class="blockquote" style="text-align: center">Product Reviews </h1>
        <hr>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>User</th>
                <th>Product</th>
                <th>Email</th>
                <th>Rating</th>
                <th>Comment</th>
            </tr>
            </thead>
            <tbody>
            @foreach($review as $value)
                <tr>
                    <td>{{$value->name}} </td>
                    <td>{{$value->product_id != null ? $value->products->product_name : '-'}}</td>
                    <td>{{$value->email}} </td>
                    <td>{{$value->star}}</td>
                    <td>{{$value->comment}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection