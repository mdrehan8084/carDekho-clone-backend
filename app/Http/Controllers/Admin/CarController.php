<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Saari cars dikhao
    public function index()
    {
        $cars = Car::latest()->get();
        return view('admin.cars.index', compact('cars'));
    }

    // Add form dikhao
    public function create()
    {
        return view('admin.cars.create');
    }

    // Car save karo
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'price'    => 'required',
            'category' => 'required',
            'type'     => 'required',
            'brand'    => 'required',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = '/images/' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $request->file('image')->getClientOriginalName());
        }

        Car::create([
            'name'     => $request->name,
            'price'    => $request->price,
            'image'    => $imagePath,
            'category' => $request->category,
            'type'     => $request->type,
            'brand'    => $request->brand,
        ]);

        return redirect('/admin/cars')->with('success', 'Car add ho gayi! ✅');
    }

    // Edit form dikhao
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars.edit', compact('car'));
    }

    // Car update karo
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $imagePath = $car->image;
        if ($request->hasFile('image')) {
            $imagePath = '/images/' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $request->file('image')->getClientOriginalName());
        }

        $car->update([
            'name'     => $request->name,
            'price'    => $request->price,
            'image'    => $imagePath,
            'category' => $request->category,
            'type'     => $request->type,
            'brand'    => $request->brand,
        ]);

        return redirect('/admin/cars')->with('success', 'Car update ho gayi! ✅');
    }

    // Car delete karo
    public function destroy($id)
    {
        Car::findOrFail($id)->delete();
        return redirect('/admin/cars')->with('success', 'Car delete ho gayi! ✅');
    }

    public function byType($type)
{
    return response()->json(Car::where('type', $type)->get());
}
}