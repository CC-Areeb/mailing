<?php

namespace App\Http\Controllers\Emails;

use App\Http\Controllers\Controller;
use App\Mail\Emails;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        return view('emails.index');
    }

    public function sendEmail()
    {
        $validator = [
            'sender' => 'sender@mail.com',
            'to' => 'receiver@mail.com',
            'subject' => 'some subject',
            'message' => 'A message from sender',
        ];
        Mail::queue((new Emails($validator))->onQueue('emails'));
        return "mail has been sent";
    }
}