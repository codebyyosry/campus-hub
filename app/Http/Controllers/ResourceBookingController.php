<?php

namespace App\Http\Controllers;

use App\Models\ResourceItem;
use App\Models\ResourceBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResourceBookingController extends Controller
{
    public function index()
    {
        $resources = ResourceItem::all();
        $bookings = ResourceBooking::with(['user', 'resourceItem'])
            ->when(Auth::user()->role !== 'admin', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->latest()
            ->get();

        return view('bookings.index', compact('resources', 'bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'resource_item_id' => 'required|exists:resource_items,id',
            'start_time' => 'required|date|after:now',
            'end_time' => 'required|date|after:start_time',
        ]);

        ResourceBooking::create([
            'user_id' => Auth::id(),
            'resource_item_id' => $request->resource_item_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.index')->with('success', 'Resource booking request submitted successfully.');
    }

    public function updateStatus(Request $request, ResourceBooking $booking)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $booking->update(['status' => $request->status]);

        return redirect()->route('bookings.index')->with('success', 'Booking status updated.');
    }
}