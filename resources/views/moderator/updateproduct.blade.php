@extends("layout.moderator")
@section("content")
    {{--        start of Add New blog--}}

    <h1>Update product</h1>

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
            <h1 class="text-info text-center">Update Product</h1>
                {!! Form::model($product, ['method' => 'PUT', 'action' => ['\App\Http\Controllers\ProductsController@update', $product->id]]) !!}
                {{ csrf_field() }}
            <input required class="form-control" name="product_name" type="text" value="{{ $product->product_name }}"><br>
            <input required class="form-control" name="product_short_desc" type="text" value="{{ $product->product_short_desc }}"><br>

                <input required class="form-control" name="product_price" type="number" value="{{ $product->product_price }}"><br>
                <input required class="form-control" name="product_quantity" type="number" value="{{ $product->product_quantity }}"><br>

            <input class="form-control" name="poster_id" value="{{$user_id}}" type="hidden"><br>
{{--            <div class="form-group">--}}
{{--                {!! Form::label('Choose Product Picture:') !!}--}}
{{--                {!! Form::file('{{$product->cover_pic}}',null,['class'=>'form-control']) !!}--}}
{{--            </div>--}}
                <input type="hidden" name="cover_pic" value="{{ $product->cover_pic }}">

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
