@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Author header) -->
    <section class="content-header">
        <h1>Edit Category</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                {!! Form::model($cat, ['method' => 'PATCH', 'action' => ['Backend\CategoryController@update', $cat->id]]) !!}
                @include('backend.category.category_edit', ['submitButtonText' => 'Update'])
                {!! Form::close() !!}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endpush