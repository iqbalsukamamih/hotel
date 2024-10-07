<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Guest;
use App\Models\Room;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['guest', 'room'])->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $guests = Guest::all(); // Asumsikan Anda sudah memiliki model Guest
        $rooms = Room::where('available', true)->get(); // Hanya kamar yang tersedia
        return view('reservations.create', compact('guests', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guest_id' => 'required|exists:guests,id',
            'room_id' => 'required|exists:rooms,id',
            'checkin_date' => 'required|date',
        ]);

        $reservation = new Reservation();
        $reservation->guest_id = $request->guest_id;
        $reservation->room_id = $request->room_id;
        $reservation->checkin_date = $request->checkin_date;
        $reservation->checkout_date = null; // Belum check-out
        $reservation->save();

        // Update status kamar
        $room = Room::find($request->room_id);
        $room->available = false; // Tandai kamar sebagai tidak tersedia
        $room->save();

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully!');
    }
}
