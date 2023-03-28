@extends('layout.moderator')
@section("content")

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Products</div>
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

                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <a href="{{url("modmanage")}}" class="btn btn-primary">Manage Product</a>
                                </div>
                            </div>

                            <table>
                                <thead>
                                <tr>
                                    <th style="padding: 10px; font-size: 20px;">Name</th>
                                    <th style="padding: 10px; font-size: 20px;">Description</th>
                                    <th style="padding: 10px; font-size: 20px;">Price</th>
                                    <th style="padding: 10px; font-size: 20px;">Quantity</th>
                                    <th style="padding: 10px; font-size: 20px;">Product Pic</th>
                                    <th style="padding: 10px; font-size: 20px;">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($product))
                                @foreach ($product as $products)
                                    <tr>
                                        <td style="padding: 10px; font-size: 20px; font-weight: bold">{{$products->product_name}}</td>
                                        <td style="padding: 10px; font-size: 20px; font-weight: bold">{{ $products->product_short_desc }}</td>
                                        <td style="padding: 10px; font-size: 20px; font-weight: bold">{{ $products->product_price }}</td>
                                        <td style="padding: 10px; font-size: 20px; font-weight: bold">{{ $products->product_quantity }}</td>
                                        <td style="padding: 10px; font-size: 20px; font-weight: bold"><img src="{{url('/product-pics/'. $products->cover_pic)}}" style="height: 100px; width: 100px; padding: 20px;"
                                                                                                           alt="fundraising"></td>
                                        <td style="display: flex; padding: 10px; ">
                                            <form action="{{url('modeditProducts', $products->id) }}" method="get">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Update</button>
                                            </form>
                                            <form action="{{ url('moddeleteProducts', $products->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection

