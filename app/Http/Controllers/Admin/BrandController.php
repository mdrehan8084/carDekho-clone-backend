<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = '/images/' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $request->file('image')->getClientOriginalName());
        }

        Brand::create([
            'name'  => $request->name,
            'image' => $imagePath,
        ]);

        return redirect('/admin/brands')->with('success', 'Brand add ho gaya! ✅');
    }

    public function destroy($id)
    {
        Brand::findOrFail($id)->delete();
        return redirect('/admin/brands')->with('success', 'Brand delete ho gaya! ✅');
    }
}