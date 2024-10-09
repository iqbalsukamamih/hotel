<?php
namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

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
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:guests',
        'checkin_date' => 'required|date',
    ]);

    $guest = Guest::create($request->except('_token'));

    return redirect()->route('guest.index')->with('success', 'Guest checked in successfully!');
}

public function checkout(Request $request, $id)
{
    $guest = Guest::find($id);
    $guest->checkout_date = now();
    $guest->save();

    return redirect()->route('guests.index')->with('success', 'Tamu berhasil checkout!');
} 
}
