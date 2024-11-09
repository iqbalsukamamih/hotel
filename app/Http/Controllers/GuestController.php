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
    $item = Guest::findOrFail($id);
    $item->delete();
    
    return redirect()->route('guests.index')->with('success', 'Item deleted successfully.');
}
public function edit(string $id)
{
    $guest= Guest::find($id);
    return view('guests.edit', compact('guest'));
}

public function update(Request $request, string $id)
{
    $guest = Guest::find($id);
    $guest->update($request->only(['name', 'email',  'checkin_date'])); // Only fill the necessary columns
    return redirect()->route('guests.index');
    }
}
