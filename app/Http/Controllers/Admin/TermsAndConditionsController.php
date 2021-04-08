<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivacyAndTerms;
use App\Http\Requests\PrivacyAndTermsRequest;

class TermsAndConditionsController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.termsandconditions.index')->with('PrivacyAndTerms', PrivacyAndTerms::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.termsandconditions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrivacyAndTermsRequest $request)
    {
      $data = $request->all();
      PrivacyAndTerms::create($data);
      return redirect()->route('termsandconditions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrivacyAndTerms  $PrivacyAndTerm 
     * @return \Illuminate\Http\Response
     */
    public function edit(PrivacyAndTerms $termsandcondition)
    {
        return view('admin.pages.termsandconditions.edit',compact('termsandcondition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrivacyAndTerms  $PrivacyAndTerm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrivacyAndTerms $termsandcondition)
    {
      $data = $request->all();
      if($data['privacy'] == null)
      {
        $data['privacy'] = $termsandcondition->privacy;
        $termsandcondition->update($data);
        return redirect()->route('termsandconditions.index');
        } elseif ($data['terms'] == null)
        {
            $data['terms'] = $termsandcondition->terms;
            $termsandcondition->update($data);
            return redirect()->route('termsandconditions.index');
        } else 
        {
            $termsandcondition->update($data);
            return redirect()->route('termsandconditions.index');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrivacyAndTerms  $PrivacyAndTerm
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrivacyAndTerms $termsandcondition)
    {
        $termsandcondition->delete();
        return back();
    }
}
