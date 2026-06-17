<?php
namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return response()->json(Brand::all());
    }

    public function store(Request $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = '/images/' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $request->file('image')->getClientOriginalName());
        }

        $brand = Brand::create([
            'name'  => $request->name,
            'image' => $imagePath,
        ]);

        return response()->json(['message' => 'Brand add ho gaya!', 'brand' => $brand]);
    }
}