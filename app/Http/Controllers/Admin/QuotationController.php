<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuotationRequest;
use App\Models\Quotation;
use App\Models\User;
use App\Notifications\QuotationApproveNotification;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
  //  Request for Quotation form
  public function requestQuotation(QuotationRequest $request)
  {
    Quotation::create([$request->validated()]);
    return back();
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.pages.quotations.index')->with('quotations', Quotation::paginate(20));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.pages.quotations.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return \Illuminate\Http\Response
   */
  public function store()
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function show()
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Models\Quotation $quotation
   * @return \Illuminate\Http\Response
   */
  public function edit(Quotation $quotation)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Models\Quotation $quotation
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Quotation $quotation)
  {
//    $user = User::where('email', $quotation->email)->first();
//    if ($request->status == 1) {
//      $user->notify(new QuotationApproveNotification());
//    }
    $data = $request->all();
    $quotation->update($data);
    return redirect()->route('quotations.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Models\Quotation $quotation
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy(Quotation $quotation)
  {
    $quotation->delete();
    return back();
  }
}
