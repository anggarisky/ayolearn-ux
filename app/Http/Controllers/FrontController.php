<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Post;

class FrontController extends Controller
{
    //
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('front.index', compact('brands'));
    }

    public function details($brand, $id_post)
    {
        $brand = Brand::where('name', $brand)->first();
        $details = Post::where('id', $id_post)->firstOrFail();
        $relate_posts = Post::where('id_brand', $brand->id)->get();
        return view('front.details', compact('details', 'brand', 'relate_posts'));
    }
}