<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContainerCalculatorController extends Controller
{
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

  /**
   * Remove the specified resource from storage.
   *
   * @param Request $request
   * @return string
   */
  // Calculate $CBM
  public function CBM(Request $request)
  {
    // Frontend inputs names : length, width, height, total(equals to number of cartons/ items)
    // Length (cm) x Width (cm) x Height (cm) x No of cartons (pcs) / 1000000= Total CBM of your goods
    $CBM = $request->length * $request->width * $request->height * $request->total / 1000000;

    if ($CBM <= 32.67 && $CBM >= 0) {
      $container = "20\" General";
    } elseif ($CBM > 32.67 && $CBM <= 37.23) {
      $container = "20\" High Cube";
    } elseif ($CBM > 37.23 && $CBM <= 66.83) {
      $container = "40\" General";
    } elseif ($CBM > 66.83 && $CBM <= 76.17) {
      $container = "40\" High Cube";
    } elseif ($CBM > 76.17 && $CBM <= 85.72) {
      $container = "45\" High Cube";
    } else {
      $container = "Does not fit";
    }

    return $CBM . $container;
  }
}
