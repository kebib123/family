@extends('backend.master.master')
@section('content')

    <div class="container">
        <h1 class="blockquote" style="text-align: center">View Subscribers</h1>
        <hr>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($email as $value)
                <tr>
                    <td>{{$value->email}}</td>
                    <td>
                        <a class="display btn btn-outline-info" data-id="{{$value->id}}">
                            <i class="fa fa-backward"></i>Reply</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal" id="myModal">

    </div>
@stop
@push('scripts')
    <script>
        $(document).ready(function () {
            $('.display').click(function (e) {
                e.preventDefault();
                var $modal = $('#myModal');
                var id = $(this).attr('data-id');

                var tempEditUrl = "{{route('reply-subscriber',':id')}}";
                tempEditUrl = tempEditUrl.replace(':id', id);
                $modal.load(tempEditUrl, function (response) {
                    console.log(response);
                    $modal.modal({show: true});
                });
            });
        });
    </script>

    @endpush
