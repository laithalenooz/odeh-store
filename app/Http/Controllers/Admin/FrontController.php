<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
  //index
  public function index()
  {
    return view('admin.pages.dashboard-ecommerce');
  }
}
