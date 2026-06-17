<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCars     = Car::count();
        $totalContacts = Contact::count();
        $recentCars    = Car::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalCars', 'totalContacts', 'recentCars'));
    }
}