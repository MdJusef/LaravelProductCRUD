@extends('admin.master')

@section('title')
    Show - Product
@endsection

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Product List</div>

                    <div class="card-body">

                        <table class="table table-hover table-bordered">
                            <tr>
                                <th>Sl</th>
                                <th>Product Name</th>
                                <th>Product Category</th>
                                <th>Product Quantity</th>
                                <th>Product Description</th>
                                <th>Product Image</th>
                                <th>Action</th>
                            </tr>
                            @php $i=1 @endphp
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_category }}</td>
                                    <td>{{ $product->product_quantity }}</td>
                                    <td>{{ $product->product_price }}</td>
                                    <td>{{ $product->product_des }}</td>
                                    <td>
                                        <img src="{{ asset($product->product_image) }}" alt="" style="height: 150px;width: 150px;">
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-danger" href="{{ route('edit-product',[$product->id]) }}">Edit</a>
                                        <form action="{{ route('delete.product') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="submit" value="delete" class="btn btn-outline-primary" >
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
