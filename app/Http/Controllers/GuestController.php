<?php
namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\ItemNotFoundException;
use PhpParser\Node\UseItem;

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
    $guest->fill($request->only(['name', 'email',  'checkin_date'])); // Only fill the necessary columns
    $guest->save();
    return redirect()->route('guests.index')->with('success', 'Guest checked in successfully!');
}

public function checkout(Request $request, $id)
{
    $guest = Guest::find($id);
    $guest->checkout_date = Carbon::now(); // Use the Carbon facade
    $guest->save();
    return redirect()->route('guests.index')->with('success', 'Tamu berhasil checkout!');
} 

public function destroy($id)
{
    Guest::destroy($id); // Menghapus guest berdasarkan ID
    return redirect()->route('guest.index')->with('success', 'guest berhasil dihapus.');
}
}
