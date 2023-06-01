<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\ProductAttri;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req )
    {
        $products = Product::orderBy('id', 'ASC')->paginate(9);
      
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $size = Attribute::where('name', 'size')->get();
        $weight = Attribute::where('name', 'wieght')->get();
        $cats = Category::orderBy('name', 'ASC')->get();
        return view('admin.product.create', compact('cats','size', 'weight'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
       
        $form_data = $request->only('name', 'price', 'sale_price', 'status', 'content','category_id');
        $file_name = $request->upload->getClientOriginalName();
        $request->upload->move(public_path('uploads'), $file_name);
        $form_data['image'] = $file_name;
        

         
        $product = Product::create($form_data);
        foreach ($request->id_attr as $value) {
            ProductAttri::create([
                'id_product' => $product->id,
                'id_attr' => $value
            ]);
        }
        return redirect()->route('product.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $size = Attribute::where('name', 'size')->get();
        $weight = Attribute::where('name', 'wieght')->get();
        $cats = Category::orderBy('name', 'ASC')->get();
        return view('admin.product.edit', compact('cats', 'product','size','weight'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric|min:100',
            'sale_price' => 'numeric|lte:price',
            'upload' => 'mimes:jpeg,jpg,png,gif,webp'
        ]);

        $form_data = $request->only('name', 'price', 'sale_price', 'status', 'category_id', 'content', 'size', 'weight');


        $form_data = $request->only('name', 'price', 'sale_price', 'status', 'category_id', 'content');


        if ($request->has('upload')) {
            $file_name = $request->upload->getClientOriginalName();
            $request->upload->move(public_path('uploads'), $file_name);
            $form_data['image'] = $file_name;
        }

        $product->update($form_data);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
