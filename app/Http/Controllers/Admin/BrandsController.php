<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBrandRequest;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.brands.index')->with('brands', Brands::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
      $data = $request->all();
      $data['image'] = Storage::disk('public')->put('brands', $data['image']);
      Brands::create($data);
      return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function show(Brands $brands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brands  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brands $brand)
    {
        return view('admin.pages.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brands  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brands $brand)
    {
      $data = $request->all();
      if ($data['image'] == null)
      {
        $data['image'] = $brand->image;
      } else {
        $data['image'] = Storage::disk('public')->put('brands', $data['image']);
      }

      if ($data['about'] == null) {
          $data['about'] = $brand->about;
      }

      $brand->update($data);
      return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brands  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brands $brand)
    {
        $brand->delete();
        return back();
    }
}
