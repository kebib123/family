@extends('backend.master.master')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h3>Add Products</h3>
    <hr>
    <div class="container">
        <form method="post" class="form-group" action="{{route('add-product')}}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="formGroupExampleInput">Product Name:</label>
                                <input type="text" name="product_name" class="form-control" id="formGroupExampleInput"
                                      value="{{old('product_name')}}" placeholder="enter product name">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Actual Price:</label>
                                <input type="text" id="price" oninput="calculate()" name="price" class="form-control"
                                       id="formGroupExampleInput" value="{{old('price')}}"
                                       placeholder="enter product price">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Selling Price:</label>
                                <input type="text" id="discount" oninput="calculate()" name="selling_price"
                                       class="form-control" id="formGroupExampleInput" value="{{old('selling_price')}}"
                                       placeholder="enter selling price">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Discount Percentage:(%)</label>
                                <input type="text" id="percent" name="discount_percentage" class="form-control"
                                       id="formGroupExampleInput" value="{{old('discount_percentage')}}"
                                       placeholder="enter discount price">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Description:</label>
                                <textarea id="title"
                                          name="description"
                                          class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Color:</label>
                                <select type="text" name="color[]" class="form-control" multiple="multiple" id="color">
                                    <option value="red">red</option>
                                    <option value="black">black</option>
                                    <option value="blue">blue</option>
                                    <option value="yellow">yellow</option>
                                    <option value="green">green</option>
                                    <option value="grey">grey</option>
                                    <option value="pink">pink</option>
                                    <option value="purple">purple</option>
                                    <option value="white">white</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Image:</label>
                                <input type="file" name="image" class="form-control" id="formGroupExampleInput" value="{{old('image')}}">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h6 class="box-title">Status</h6>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group mb-none">
                                <select class="form-control" name="status">
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h6 class="box-title">Featured/Unfeatured</h6>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group mb-none">
                                <select class="form-control" name="is_featured">
                                    <option value="featured">Featured</option>
                                    <option value="unfeatured">Unfeatured</option>
                                </select>

                            </div>
                        </div>
                        <div class="box-header with-border">
                            <h6 class="box-title">Popular/Unpopular</h6>
                        </div>
                        <div class="box-body">
                            <div class="form-group mb-none">
                                <select class="form-control" name="is_popular">
                                    <option value="popular">Popular</option>
                                    <option value="notpopular">Not Popular</option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h6 class="box-title">Size</h6>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group mb-none">
                                <select class="form-control" id="size" multiple="multiple" name="size[]">
                                    <option value="small">Small</option>
                                    <option value="medium">Medium</option>
                                    <option value="large">Large</option>
                                    <option value="xl">XL</option>
                                    <option value="xxl">XXL</option>
                                    <option value="xxxl">XXXL</option>
                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h6 class="box-title">Brands</h6>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group mb-none">
                                <select class="form-control" name="brand">
                                    <option selected="selected" value="">Select Brand</option>
                                    @foreach($brand as $value)
                                        <option value="{{$value->id}}">{{$value->brand_name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h6 class="box-title">Select Category</h6>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group mb-none">
                                <select class="form-control" name="category">
                                    <option selected="selected" value="">Select Category</option>
                                    @foreach($cat as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                        @include('backend.pages.category.category_dropdown',['category'=>$value])
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                       aria-controls="nav-home" aria-selected="true">Description</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                       aria-controls="nav-profile" aria-selected="false">Information</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-inventory" role="tab"
                       aria-controls="nav-profile" aria-selected="false">Inventory</a>
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-12 column">
                                <table class="table table-bordered table-hover" id="tab_logic">
                                    <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th class="text-center">
                                            Title
                                        </th>
                                        <th class="text-center">
                                            Description
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr id='addr0'>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <input type="text" name='title[]' placeholder='Title' class="form-control"/>
                                        </td>
                                        <td>
                                            <input type="text" name='description1[]' placeholder='Description'
                                                   class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr id='addr1'></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row'
                                                                                        class="pull-right btn btn-default">Delete
                            Row</a>
                    </div>

                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Information</label>
                        <textarea id="desc"
                                  name="information"
                                  class="form-control"></textarea>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-inventory" role="tabpanel" aria-labelledby="nav-profile-tab">


                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="sku" class="control-label col-sm-3">SKU</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="sku" type="text" id="sku">

                                </div>
                            </div>

                            <div class="form-group" style="">
                                <label class="col-sm-3 control-label" for="qty">Stock Qty</label>
                                <div class="col-sm-9">
                                    <input min="0" class="form-control" name="stock_qty" type="number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"
                                       for="stock_availability_status">Stock Availability</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="stock">
                                        <option value="1">In Stock</option>
                                        <option value="0">Out of Stock</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus-circle"></i> Add Product
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>

            </div>
        </form>

    </div>
    </div>
@stop
@push('scripts')
    <script>
        $(document).ready(function () {
            var i = 1;

            $("#add_row").click(function () {
                $('#addr' + i).html("<td>" + (i + 1) + "</td><td><input name='title[]" + i + "' type='text' placeholder='Title' class='form-control input-md'  /> </td><td><input  name='description1[]" + i + "' type='text' placeholder='Description'  class='form-control input-md'></td>");

                $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
                i++;
            });
            $("#delete_row").click(function () {
                if (i > 1) {
                    $("#addr" + (i - 1)).html('');
                    i--;
                }
            });

        });
    </script>

    <script type="text/javascript">
        function calculate() {
            var price = document.getElementById('price').value;
            var discount = document.getElementById('discount').value;
            var total = document.getElementById('percent');
            var final = ((price - discount) / price) * 100;
            document.getElementById('percent').value = final;
        }
    </script>
    <script src="{{url('js/select2.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#size').select2();
            $('#color').select2();
        });
    </script>

@endpush