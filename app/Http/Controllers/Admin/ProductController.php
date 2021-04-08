<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.pages.products.index')->with('products', Product::with('category')->paginate(20));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.pages.products.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreProductRequest $request)
  {
    $data = $request->all();
    $data['image'] = Storage::disk('public')->put('products', $data['image']);
    Product::create($data);
    return redirect()->route('products.index');
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Models\Product $product
   * @return \Illuminate\Http\Response
   */
  public function show(Product $product)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Models\Product $product
   * @return \Illuminate\Http\Response
   */
  public function edit(Product $product)
  {
    return view('admin.pages.products.edit', compact('product'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Models\Product $product
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateProductRequest $request, Product $product)
  {
    $data = $request->all();
    if ($data['image'] == null) {
      $data['image'] = $product->image;
    } else {
      $data['image'] = Storage::disk('public')->put('products', $data['image']);
    }
    $product->update($data);
    return redirect()->route('products.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Models\Product $product
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy(Product $product)
  {
    $product->delete();
    return back();
  }
}
