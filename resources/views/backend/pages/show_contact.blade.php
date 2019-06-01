@extends('backend.master.master')
@section('content')

    <div class="container">
            <h1 class="blockquote" style="text-align: center">View Contact Form </h1>
        <hr>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($form as $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->message}}</td>
                            <td>
                                <a class="btn btn-danger confirm"
                                   href="{{route('delete-contact',$value->id)}}"
                                   onclick="return confirm('Confirm Delete?')"><i
                                            class="fa fa fa-trash"></i>Delete </a>
                                <a class="display btn btn-outline-info"  data-id="{{$value->id}}">
                                    <i class="fa fa-backward"></i>Reply</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>





        <!-- The Modal -->
        <div class="modal" id="myModal">
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('.display').click(function (e) {
                e.preventDefault();
                var $modal = $('#myModal');
                var id = $(this).attr('data-id');
                console.log(id);
                var tempEditUrl = "{{route('reply',':id')}}";
                tempEditUrl = tempEditUrl.replace(':id', id);
                $modal.load(tempEditUrl, function (response) {
                    $modal.modal({show: true});
                });
            });
        });
    </script>
@endpush
