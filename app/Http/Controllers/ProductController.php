<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.add-product');
    }
    public function insertProduct(Request $request){
        $this->product = new Product();
        $this->product->product_name = $request->product_name;
        $this->product->product_category = $request->product_category;
        $this->product->product_quantity = $request->product_quantity;
        $this->product->product_price = $request->product_price;
        $this->product->product_des = $request->product_des;
        if($request->file('product_image')){
            $this->product->product_image = $this->saveImage($request);
        }
        $this->product->save();
        return redirect('add-product')->with('message','success');
    }
    public function saveImage($request){
        $image = $request->file('product_image');
        $imageName = rand().'.'.$image->getClientOriginalExtension();
        $directory = 'adminAsset/product-image/';
        $imgUrl = $directory.$imageName;
        $image->move($directory,$imageName);
        return $imgUrl;
    }
    public function showProduct(){
        return view('admin.product.show-product',[
            'products'=>Product::all()
        ]);
    }
    public function deleteProduct(Request $request){
        $this->product = Product::find($request->product_id);

        if($this->product->product_image){
            unlink($this->product->product_image);
        }
        $this->product->delete();
        return redirect('show-product');
    }
    public function editProduct($id){
        return view('admin.product.edit-product',[
            'product'=>Product::find($id)
        ]);
    }
    public function updateProduct(){
        //
    }
}
