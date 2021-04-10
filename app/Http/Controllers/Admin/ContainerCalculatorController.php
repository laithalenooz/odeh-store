<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CBMRequest;
use App\Http\Requests\QuotationRequest;
use App\Models\Quotation;
use Illuminate\Http\Request;

class ContainerCalculatorController extends Controller
{
  /**
   * Remove the specified resource from storage.
   *
   * @param Request $request
   * @return string
   */
  // Calculate $CBM
  public function CBM(CBMRequest $request)
  {
    // Frontend input names : length, width, height, total(equals to number of cartons/ items)
    // Form route {{route('CBM.equation')}} & method="post"
    // Response $container variable, it contains the results after completing the calculation.
    // Length (cm) x Width (cm) x Height (cm) x No of cartons (pcs) / 1000000= Total CBM of your goods
    $CBM = $request->length * $request->width * $request->height * $request->total / 1000000;

    // $container response based on statements
    if ($CBM <= 32.67 && $CBM >= 0) $container = "20\" General Container";
    elseif ($CBM > 32.67 && $CBM <= 37.23) $container = "20\" High Cube Container";
    elseif ($CBM > 37.23 && $CBM <= 66.83) $container = "40\" General Container";
    elseif ($CBM > 66.83 && $CBM <= 76.17) $container = "40\" High Cube Container";
    elseif ($CBM > 76.17 && $CBM <= 85.72) $container = "45\" High Cube Container";
    else $container = "Does not fit the Container";

    return $container;
  }

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
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
