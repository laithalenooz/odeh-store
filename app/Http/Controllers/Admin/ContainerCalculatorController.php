<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CBMRequest;
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

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }
}
