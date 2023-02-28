<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class FrontController extends Controller
{
    //
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('front.index', compact('brands'));
    }
}