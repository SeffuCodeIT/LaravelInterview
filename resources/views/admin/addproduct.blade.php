@extends("layout.admin")
@section("content")
    {{--        start of Add New blog--}}

    <h1>Add New product</h1>

    <div class="row" style="background-color: #88c6c1;">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    <p>{{session('success')}}</p>
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    <p>{{session('error')}}</p>
                </div>
            @endif
            <h1 class="text-info text-center">Add New Products</h1>
            {!! Form::open(['method'=>'POST', 'action'=>'\App\Http\Controllers\ProductsController@store','files'=>true]) !!}
            {{csrf_field()}}
            <input required class="form-control" name="product_name" placeholder="Enter Product Name" type="text"><br>
            <input required class="form-control" name="product_short_desc" placeholder="Enter Product Description"
                   type="text"><br>
                <input required class="form-control" name="product_price" placeholder="Enter Product Price"
                       type="number"><br>
                <input required class="form-control" name="product_quantity" placeholder="Enter Product Quantity"
                       type="number"><br>

            <input class="form-control" name="poster_id" value="{{$user_id}}" type="hidden"><br>
            <div class="form-group">
                {!! Form::label('Choose Product Picture:') !!}
                {!! Form::file('cover_pic',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="form-group">
                    {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}

        </div>
        <div class="col-md-3"></div>
    </div>
    {{--        end of adding new product--}}

@endsection
