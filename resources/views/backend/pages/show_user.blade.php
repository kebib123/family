@extends('backend.master.master')
@section('content')

    <div class="container">
        <h1 class="blockquote" style="text-align: center">View Registered Users </h1>
        <hr>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Roles</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user as $value)
                <tr>
                    <td>{{$value->roles}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->phone}}</td>
                    <td>
                        <a class="btn btn-danger confirm"
                           href="{{route('delete-user',$value->id)}}"
                           onclick="return confirm('Confirm Delete?')"><i
                                    class="fa fa fa-trash"></i>Delete </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop
