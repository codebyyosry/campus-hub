<?php

namespace App\Http\Controllers;

use App\Models\SupportRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportRequestController extends Controller
{
    // Display a listing of requests for the authenticated user (or all if admin)
    public function index()
    {
        $user = Auth::user();

        // Admin can see everything; regular users only see their own requests
        if ($user->role === 'admin') {
            $requests = SupportRequest::with(['user', 'category'])->latest()->get();
        } else {
            $requests = SupportRequest::with(['user', 'category'])
                ->where('user_id', $user->id)
                ->latest()
                ->get();
        }

        return view('requests.index', compact('requests'));
    }

    // Show the form to create a new request
    public function create()
    {
        $categories = Category::all();
        return view('requests.create', compact('categories'));
    }

    // Store a newly created request in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        SupportRequest::create([
            'user_id' => Auth::id(),
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => 'pending',
        ]);

        return redirect()->route('requests.index')
            ->with('success', 'Support request submitted successfully.');
    }


    public function updateStatus(Request $request, SupportRequest $supportRequest)
    {
        // Ensure only admins can modify ticket statuses
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'status' => 'required|in:pending,in-progress,resolved,closed',
        ]);

        $supportRequest->update([
            'status' => $request->status,
        ]);

        return redirect()->route('requests.index')->with('success', 'Request status updated successfully.');
    }


    public function show(SupportRequest $supportRequest)
    {
        // Ensure standard users can only view their own requests, while admins can view all
        if (Auth::user()->role !== 'admin' && $supportRequest->user_id !== Auth::id()) {
            abort(403);
        }

        $supportRequest->load('category', 'user', 'comments.user');

        return view('requests.show', compact('supportRequest'));
    }
}