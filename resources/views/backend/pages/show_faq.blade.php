@extends('backend.master.master')
@section('content')

    <div class="container">
        <h1 class="blockquote" style="text-align: center">View FAQ </h1>
        <hr>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($faq as $value)
                <tr>
                    <td>{!! $value->title !!}</td>
                    <td>{!!  $value->description!!}</td>
                    <td>
                        <a class="btn btn-danger confirm"
                           href="{{route('delete-faq',$value->id)}}"
                           onclick="return confirm('Confirm Delete?')"><i
                                    class="fa fa fa-trash"></i>Delete </a>
                        <a href="{{route('edit-faq',$value->id)}}" class="btn btn-secondary"><i
                                    class="fa fa-edit">Edit</i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @endsection