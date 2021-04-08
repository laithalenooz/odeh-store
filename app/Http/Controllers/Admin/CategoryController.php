<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.pages.categories.index')->with('categories', Category::paginate(20));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.pages.categories.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreCategoryRequest $request)
  {
    $data = $request->all();
    $data['image'] = Storage::disk('public')->put('categories', $data['image']);
    Category::create($data);
    return redirect()->route('categories.index');
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Models\Category $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Models\Category $category
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category)
  {
    return view('admin.pages.categories.edit', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Models\User $category
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Category $category)
  {
    $data = $request->all();
    if ($data['image'] == null) {
      $data['image'] = $category->image;
    } else {
      $data['image'] = Storage::disk('public')->put('categories', $data['image']);
    }
    $category->update($data);
    return redirect()->route('categories.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Models\User $category
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy(Category $category)
  {
    $category->delete();
    return back();
  }
}
