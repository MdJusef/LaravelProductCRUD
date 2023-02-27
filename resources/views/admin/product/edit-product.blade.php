@extends('admin.master')
@section('title')
    Edit - Product
@endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center font-bold">Add Product </p> </div>

                    <div class="card-body">

                        <form action="{{ route('update.product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <label for="">Product Name</label>
                            <input type="text" value="{{ $product->product_name }}" name="product_name" class="form-control mt-2 mb-2" placeholder="Input Product Name">

                            <label for="">Product Category</label>
                            <input type="text" value="{{ $product->product_category }}" name="product_category" class="form-control mt-2 mb-2" placeholder="Input Product Category">

                            <label for="">Product Quantity</label>
                            <input type="number" value="{{ $product->product_quantity }}" name="product_quantity" class="form-control mt-2 mb-2" placeholder="Input Product Quantity">

                            <label for="">Product Price</label>
                            <input type="number" value="{{ $product->product_price }}" name="product_price" class="form-control mt-2 mb-2" placeholder="Input Product Price">

                            <label for="">Product Description</label>
                            <input type="text" value="{{ $product->product_des }}" name="product_des" class="form-control mt-2 mb-2" placeholder="Input Product Description">


                            <label for="">Product Image</label>
                            <input type="file" value="{{ $product->product_image }}" name="product_image" class="form-control mt-2 mb-2">

                            <input type="submit" value="submit" class="form-control mt-2 mb-2 btn btn-outline-danger">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

