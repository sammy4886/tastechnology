<?php

namespace App\Http\Controllers;

use App\Contact;
//use Illuminate\Http\Requests\MailRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\MailRequest;

class EmailController extends Controller
{
     public function send(MailRequest $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
        {
            $message->from('me@gmail.com', 'Christian Nwamba');

            $message->to('chrisn@scotch.io');
        });

        return response()->json(['message' => 'Request completed']);
    }


    public function sendMail(MailRequest $request)
    {
        $data = [
            'name'    => $request->get('name'),
            'name1'   => "Malla and Malla",
            'email'   => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message')
        ];

        Mail::send('emails.confirmation_user', [ 'data' => $data ], function ($message) use ($request)
        {
            $message->to("prashant.thapa@accessworld.net", "Malla and Malla")->subject($request->get('subject'));
            $message->from($request->get('email'), $request->get('name'), $request->get('subject'));

            DB::transaction(function() use($request)
            {
                Contact::create($request->data());
            });

        });
        $data = [
            'name1'   => $request->get('name'),
            'name'    => "Malla and Malla",
            'email'   => $request->get('email'),
            'subject' => "Email Received",
            'message' => "Thanks for contacting us. We have received your email. We will be soon in touch with you!",

        ];
        Mail::send('emails.confirmation_company', [ 'data' => $data ], function ($message) use ($request)
        {
            $message->to($request->get('email'), $request->get('name'))->subject("RE:" . $request->get('subject'));
            $message->from("prashant.thapa@accessworld.net", "Malla and Malla");
        });

        return back()->withSuccess(trans('messages.create_success', [ 'entity' => 'Mail' ]));


    }

    public function index()
    {
        $contacts = Contact::all();
        return view('backend.contact.index',compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('backend.contact.show',compact('contact'));
    }

    /**
     * @param Contact $contact
     * @return mixed
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->withSuccess(trans('message.delete_success', [ 'entity' => 'Contact' ]));
    }
}
