<?php

namespace App\Http\Controllers;

use App\Models\SupportRequest;
use App\Models\ResourceBooking;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $supportCount = $user->role === 'admin'
            ? SupportRequest::count()
            : SupportRequest::where('user_id', $user->id)->count();

        $pendingRequestsCount = $user->role === 'admin'
            ? SupportRequest::where('status', 'pending')->count()
            : SupportRequest::where('user_id', $user->id)->where('status', 'pending')->count();

        $bookingCount = $user->role === 'admin'
            ? ResourceBooking::count()
            : ResourceBooking::where('user_id', $user->id)->count();

        $pendingBookingsCount = $user->role === 'admin'
            ? ResourceBooking::where('status', 'pending')->count()
            : ResourceBooking::where('user_id', $user->id)->where('status', 'pending')->count();

        return view('dashboard', compact(
            'supportCount',
            'pendingRequestsCount',
            'bookingCount',
            'pendingBookingsCount'
        ));
    }
}