<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\SupportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, SupportRequest $supportRequest)
    {
        if (Auth::user()->role !== 'admin' && $supportRequest->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        Comment::create([
            'support_request_id' => $supportRequest->id,
            'user_id' => Auth::id(),
            'body' => $request->body,
        ]);

        return redirect()->route('requests.show', $supportRequest->id)->with('success', 'Comment added successfully.');
    }
}