<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSettings;
use App\Http\Requests\StoreSettingsRequest;
use Illuminate\Support\Facades\Storage;

class SiteSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.settings.index')->with('settings', SiteSettings::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingsRequest $request)
    {
      $data = $request->all();
      $data['image'] = Storage::disk('public')->put('settings', $data['image']);
      SiteSettings::create($data);
      return redirect()->route('settings.index');
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
     * @param  \App\Models\SiteSettings  $setting 
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteSettings $setting)
    {
        return view('admin.pages.settings.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiteSettings  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteSettings $setting)
    {
        $data = $request->all();
      if ($data['image'] == null)
      {
        $data['image'] = $setting->image;
      } else {
        $data['image'] = Storage::disk('public')->put('settings', $data['image']);
      }
      $setting->update($data);
      return redirect()->route('settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteSettings  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteSettings $setting)
    {
        $setting->delete();
        return back();
    }
}
