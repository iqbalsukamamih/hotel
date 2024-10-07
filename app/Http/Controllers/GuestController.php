<?php
namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');
        $guests = Guest::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('name', 'like', '%' . $query . '%')
                                ->orWhere('email', 'like', '%' . $query . '%');
        })->paginate(10);
    
        return view('guests.index', compact('guests', 'query'));
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

        Guest::create($request->all());

        return redirect()->route('guests.index')->with('success', 'Guest checked in successfully!');
    }

    public function checkout($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->checkout_date = now();
        $guest->save();

        return redirect()->route('guests.index')->with('success', 'Guest checked out successfully!');
    }
}
