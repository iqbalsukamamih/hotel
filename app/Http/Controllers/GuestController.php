<?php
namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
        return view('guests.index', compact('guests'));
    }

    public function create()
    {
        return view('guests.create');
    }


    public function store(Request $request)
{
    $guest = new Guest();
    $guest->fill($request->only(['name', 'email', 'phone'])); // Only fill the necessary columns
    $guest->save();
    return redirect()->route('guest.index')->with('success', 'Guest checked in successfully!');
}

public function checkout(Request $request, $id)
{
    $guest = Guest::find($id);
    $guest->checkout_date = Carbon::now(); // Use the Carbon facade
    $guest->save();
    return redirect()->route('guest.index')->with('success', 'Tamu berhasil checkout!');
} 
}
