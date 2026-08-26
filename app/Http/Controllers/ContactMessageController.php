<?php
// app/Http/Controllers/ContactMessageController.php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function showContactForm()
    {
        $profile = Profile::first();
        return view('public.contact', compact('profile'));
    }

    public function index()
    {
        $messages = ContactMessage::with('profile')
            ->when(request('status'), function ($query, $status) {
                $query->where('status', $status);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.contact-messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => [
                'nullable',
                'string',
                'max:20',
                'regex:/^[0-9+\-\s]+$/' // Hanya angka, +, -, dan spasi
            ],
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'profile_id' => 'required|exists:profiles,id',
        ]);

        $message = ContactMessage::create($request->all());

        // Optional: Send email notification to admin
        // Mail::to($message->profile->email)->send(new ContactMessageReceived($message));

        return redirect()->back()->with('success', 'Pesan berhasil dikirim! Kami akan segera menghubungi Anda.');
    }

    public function show(ContactMessage $contactMessage)
    {
        $contactMessage->markAsRead();
        return view('admin.contact-messages.show', compact('contactMessage'));
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Pesan berhasil dihapus!');
    }

    public function markAsRead(ContactMessage $contactMessage)
    {
        $contactMessage->markAsRead();
        return response()->json(['success' => true]);
    }

    public function markAsReplied(ContactMessage $contactMessage)
    {
        $contactMessage->markAsReplied();
        return response()->json(['success' => true]);
    }
}