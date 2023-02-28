<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::latest()->get();
        return view('brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('brand.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        $logo = str_replace(' ', '-', $request->file('logo')->getClientOriginalName());

        $url = $request->file('logo')->storeAs(
            'assets/logo',
            $logo,
            'public'
        );

        $data['logo'] = $url;
        $data['slug'] = Str::slug($request->name);

        Brand::create($data);

        return redirect()->route('admin.index.brand');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand, $id)
    {
        //
        $details = Brand::where('id', $id)->firstOrFail();
        return view('brand.edit', compact('details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand, $id)
    {
        //

        $data = $request->all();

        if ($request->file('logo')) {
            $logo = str_replace(' ', '-', $request->file('logo')->getClientOriginalName());

        $url = $request->file('logo')->storeAs(
            'assets/logo',
            $logo,
            'public'
        );

        $data['logo'] = $url;
        }
        $data['slug'] = Str::slug($request->name);

        $details = Brand::findOrFail($id);
        $details->update($data);

        return redirect()->route('admin.index.brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */

    public function destroy(Brand $brand, Request $request, $id)
    {
        //
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('admin.index.brand');
    }
}