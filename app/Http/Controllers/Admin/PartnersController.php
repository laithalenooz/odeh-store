<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnersController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.pages.partners.index')->with('partners', Partner::paginate(20));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.pages.partners.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(StorePartnerRequest $request)
  {
    $data = $request->all();
    $data['image'] = Storage::disk('public')->put('partners', $data['image']);
    Partner::create($data);
    return redirect()->route('brands.index');
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Models\Partner $partner
   * @return \Illuminate\Http\Response
   */
  public function show(Partner $partner)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Models\Partner $partner
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
   */
  public function edit(Partner $partner)
  {
    return view('admin.pages.partners.edit', compact('partner'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Models\Partner $partner
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(Request $request, Partner $partner)
  {
    $data = $request->all();
    if ($data['image'] == null) {
      $data['image'] = $partner->image;
    } else {
      $data['image'] = Storage::disk('public')->put('brands', $data['image']);
    }

    if ($data['about'] == null) {
      $data['about'] = $partner->about;
    }

    $partner->update($data);
    return redirect()->route('partners.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Models\Partner $partner
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy(Partner $partner)
  {
    $partner->delete();
    return back();
  }
}
