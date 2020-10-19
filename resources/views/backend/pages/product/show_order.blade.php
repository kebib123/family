@extends('backend.master.master')
@section('content')

    <div class="container">
        <h1 class="blockquote" style="text-align: center">View Orders</h1>
        <hr>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>S.N</th>
                <th>Order Date</th>
                <th>User</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($address as $key=>$value)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$value->created_at}} </td>
                    <td>{{$value->users->name}} </td>
                    <td>@if($value->status==0)
                            <span class="badge badge-danger">Pending</span>
                            @endif
                        @if(($value->status==1))
                            <span class="badge badge-success">Completed</span>
                        @endif
                        @if(($value->status==2))
                            <span class="badge badge-secondary">Cancel</span>
                        @endif
                        @if(($value->status==3))
                            <span class="badge badge-primary">Return</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('order-details',$value->id)}}"><i class="fa fa-eye"></i> </a>

                        <a class="btn btn-danger confirm"
                           href="{{route('order-delete',$value->id)}}"
                           onclick="return confirm('Confirm Delete?')"><i
                                    class="fa fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br>

@endsection

