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
    <h3>Update Product</h3>
    <hr>
    <div class="container">
        <form method="post" class="form-group" action="{{route('edit-product')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="pro" value="{{$product->id}}">

            <div class="row">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="formGroupExampleInput">Product Name:</label>
                                <input type="text" name="product_name" class="form-control" id="formGroupExampleInput"
                                       value="{{$product->product_name}}" placeholder="enter product name">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Actual Price:</label>
                                <input type="text" id="price" oninput="calculate()" name="price" class="form-control"
                                       id="formGroupExampleInput" value="{{$product->price}}"
                                       placeholder="enter product price">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Selling Price:</label>
                                <input type="text" id="discount" oninput="calculate()" name="selling_price"
                                       class="form-control" id="formGroupExampleInput"
                                       value="{{$product->selling_price}}"
                                       placeholder="enter selling price">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Discount Percentage:(%)</label>
                                <input type="text" id="percent" name="discount_percentage" class="form-control"
                                       id="formGroupExampleInput" value="{{$product->discount_percentage}}"
                                       placeholder="enter discount price">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Description:</label>
                                <textarea id="title"
                                          name="description"
                                          class="form-control">{{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Color:</label>
                                <select type="text" name="color[]" class="form-control" multiple="multiple" id="color">
                                    <option @if(strpos($product->color,'red')!==false)selected @endif value="red">red
                                    </option>
                                    <option @if(strpos($product->color,'black')!==false)selected @endif value="black">
                                        black
                                    </option>
                                    <option @if(strpos($product->color,'blue')!==false)selected @endif value="blue">
                                        blue
                                    </option>
                                    <option @if(strpos($product->color,'yellow')!==false)selected @endif value="yellow">
                                        yellow
                                    </option>
                                    <option @if(strpos($product->color,'green')!==false)selected @endif value="green">
                                        green
                                    </option>
                                    <option @if(strpos($product->color,'grey')!==false)selected @endif value="grey">
                                        grey
                                    </option>
                                    <option @if(strpos($product->color,'pink')!==false)selected @endif value="pink">
                                        pink
                                    </option>
                                    <option @if(strpos($product->color,'purple')!==false)selected @endif value="grey">
                                        purple
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Current Picture:</label>
                                <br>
                                <img src="{{url('images/products/'.$product->image)}}" width="100px">
                                <hr>

                                <label for="formGroupExampleInput">Image:</label>
                                <input type="file" name="image" class="form-control" id="formGroupExampleInput"
                                       value="{{old('image')}}">
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
                                    <option @if($product->status==1) selected @endif value="1">Enabled</option>
                                    <option @if($product->status==0) selected @endif value="0">Disabled</option>
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
                                    <option @if($product->is_featured=='featured') selected @endif value="featured">
                                        Featured
                                    </option>
                                    <option @if($product->is_featured=='unfeatured') selected @endif value="unfeatured">
                                        Unfeatured
                                    </option>
                                </select>

                            </div>
                        </div>
                        <div class="box-header with-border">
                            <h6 class="box-title">Popular/Unpopular</h6>
                        </div>
                        <div class="box-body">
                            <div class="form-group mb-none">
                                <select class="form-control" name="is_popular">
                                    <option @if($product->is_popular=='popular') selected @endif value="popular">
                                        Popular
                                    </option>
                                    <option @if($product->is_popular=='unpopular') selected @endif value="notpopular">
                                        Not Popular
                                    </option>
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
                                    <option @if(strpos($product->size,'small')!==false)selected @endif value="small">
                                        small
                                    </option>
                                    <option @if(strpos($product->size,'medium')!==false)selected @endif value="medium">
                                        medium
                                    </option>
                                    <option @if(strpos($product->size,'large')!==false)selected @endif value="large">
                                        large
                                    </option>
                                    <option @if(strpos($product->size,'xl')!==false)selected @endif value="xl">XL
                                    </option>
                                    <option @if(strpos($product->size,'xxl')!==false)selected @endif value="x-x-l">XXL
                                    </option>
                                    <option @if(strpos($product->size,'xxxl')!==false)selected @endif value="x-x-x-l">
                                        XXXL
                                    </option>
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
                                    <option selected value="">No Brand</option>
                                    @foreach($brand as $value)
                                        <option @if($product->brand_id==$value->id) selected
                                                @endif value="{{$value->id}}">{{$value->brand_name}}</option>
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
                                        <option @if(isset($product->category_id) && $product->category_id == $value->id) selected
                                                @endif value="{{$value->id}}">{{$value->name}}</option>
                                        @include('backend.pages.category.category_dropdown',['category'=>$value])
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="form-group special-link">
                        <label for="name" class="col-sm-2 col-md-3 control-label">Special</label>
                        <select class="form-control" onChange="showSpecial()" name="isSpecial" id="isSpecial">
                            <option @if($product->is_special==0) selected @endif value="0">No</option>
                            <option @if($product->is_special==1) selected @endif value="1">Yes</option>
                        </select>
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                  Choose if this is in deals/special products. Special products belongs to deals.</span>
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
                                <table class="table table-bordered table-hover rowadd"
                                       id="tab_logic">
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
                                    @foreach($product->descriptions as $key=>$value)
                                        <tr id='addr0' data-row="{{$loop->iteration}}">

                                            <td>
                                                {{$value->id}}
                                            </td>
                                            <td>
                                                <input type="text" value="{{$value->title}}"
                                                       name='specification[title][{{$value->id}}]'
                                                       placeholder='Name'
                                                       class="form-control"/>
                                            </td>
                                            <td>
                                                    <textarea id="1" name='specification[detail][{{$value->id}}]'
                                                              placeholder='Details'
                                                              class="form-control">{{$value->description}}</textarea>
                                            </td>
                                            <td>
                                                <a href="{{route('delete-specification',$value->id)}}"
                                                   onclick="return confirm('Are you sure')"
                                                   class="btn btn-danger btn btn-sm"><i
                                                            class="fa fa-trash"></i> </a>
                                            </td>

                                        </tr>


                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <a id="add_row" class="btn btn-default pull-left">Add Row</a>
                    </div>

                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Information</label>
                        <textarea id="desc"
                                  name="information"
                                  class="form-control">{{$product->informations->information}}</textarea>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-inventory" role="tabpanel" aria-labelledby="nav-profile-tab">


                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="sku" class="control-label col-sm-3">SKU</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="sku" type="text" id="sku"
                                           value="{{$product->stocks->sku}}">

                                </div>
                            </div>

                            <div class="form-group" style="">
                                <label class="col-sm-3 control-label" for="qty">Stock Qty</label>
                                <div class="col-sm-9">
                                    <input min="0" class="form-control" name="stock_qty" type="number"
                                           value="{{$product->stocks->quantity}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"
                                       for="stock_availability_status">Stock Availability</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="stock">
                                        <option @if($product->stocks->stock_availability==1) selected @endif value="1">
                                            In Stock
                                        </option>
                                        <option @if($product->stocks->stock_availability==0) selected @endif value="0">
                                            Out of Stock
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus-circle"></i> Update Product
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

            $("#add_row").click(function () {
                var last = $("table.rowadd > tbody > tr ").last().attr("data-row");
                console.log(last);
                var i = last ? parseInt(last) + 1 : 1;
                $('#tab_logic').append('<tr id="addr' + i + '" data-row="' + i +
                    '" ></tr>'
                );
                $('#addr' + i).html("<td>" + i + "</td><td><input name='specification[title][bigtech-" + i + "]' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='specification[detail][bigtech-" + i + "]' type='text' placeholder='Details'  class='form-control input-md'></td>");


                // i++;
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