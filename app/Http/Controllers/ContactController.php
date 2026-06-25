<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessageMail;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        $data = $request->validated();

        Message::create($data);

        try {
            Mail::to('muhammaddheril06@gmail.com')->send(new ContactMessageMail($data));
        } catch (\Throwable $e) {
            logger('Contact email failed: ' . $e->getMessage());
        }

        return redirect()->to('/#contact')->with('success', 'Pesan berhasil dikirim!');
    }
}
