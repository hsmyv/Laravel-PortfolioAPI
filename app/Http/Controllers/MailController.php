<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Mail as ContactMail;
use Illuminate\Support\Str;
use PDF;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $formfill = $request->validate([
            'name'       => 'required',
            'email'      => 'required',
            'subject'    => 'required',
            'body'       => 'required',
        ]);

        if ($request->has('file')) {
            $file = $request->file('file');
            $file_name =  Str::random(7) . '.' . $file->getClientOriginalExtension();
            $destinationPath = "/mail";
            $file->move(public_path($destinationPath), $file_name);
            $file = 'mail/' . $file_name;
        }
        $contacts = [
            'name'      => $request['name'],
            'email'     => $request['email'],
            'subject'   => $request['subject'],
            'body'      => $request['body'],
            'file'      => $file
        ];
        $mail = 'hsmusayev@gmail.com';


        $contactmail = ContactMail::create($contacts);
        Mail::to('hsmusayev@gmail.com')->send(new ContactFormMail($contacts, $file));

        return $contactmail;
    }
}
