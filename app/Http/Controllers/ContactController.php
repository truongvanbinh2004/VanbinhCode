<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{   
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact', compact('contacts'));
    }

    public function store(Request $request)
    {   
        $validated = $request->validate([
            'your-name' => 'required|string|max:255',
            'your-email' => 'required|email|max:255',
            'your-subject' => 'nullable|string|max:255',
            'your-message' => 'required|string',
        ]);

        Contact::create([
            'name' => $validated['your-name'],
            'email' => $validated['your-email'],
            'subject' => $validated['your-subject'],
            'message' => $validated['your-message'],
            'contacted' => false, // Thêm trạng thái liên hệ
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function reply(Request $request, $id)
    {
        $validated = $request->validate([
            'reply_message' => 'required|string',
        ]);

        $contact = Contact::findOrFail($id);

        Mail::send([], [], function ($message) use ($contact, $validated) {
            $message->to($contact->email)
                    ->subject('Phản hồi từ quản trị viên')
                    ->setBody($validated['reply_message'], 'text/html');
        });

        $contact->contacted = true;
        $contact->save();

        return redirect()->back()->with('success', 'Phản hồi đã được gửi thành công.');
    }
}
