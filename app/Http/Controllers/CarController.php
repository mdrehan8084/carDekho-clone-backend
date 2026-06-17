<?php
namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Saari cars
    public function index()
    {
        return response()->json(Car::all());
    }

    // Type se cars — suv, electric, upcoming
    public function byType($type)
    {
        return response()->json(Car::where('type', $type)->get());
    }

    // Car add karo
    public function store(Request $request)
    {
        $car = Car::create($request->all());
        return response()->json(['message' => 'Car add ho gayi!', 'car' => $car]);
    }

    // Car delete karo
    public function destroy($id)
    {
        Car::findOrFail($id)->delete();
        return response()->json(['message' => 'Car delete ho gayi!']);
    }
}