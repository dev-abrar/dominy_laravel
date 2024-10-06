<?php

namespace App\Http\Controllers;

use App\Mail\MessageMail;
use App\Models\Message;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    function message()
    {
        return view('pages.dashboard.messages');
    }

    function create_message(Request $request)
    {
        Message::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'desp' => $request->input('desp'),
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Your message has been sent!',
        ]);
    }

    function get_message()
    {
        return Message::all();
    }
    function delete_message(Request $request)
    {
        Message::find($request->message_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }

    function reply_message($message_id)
    {
        $message = Message::find($message_id);
        return view('pages.dashboard.message_view', compact('message'));
    }

    function update_message(Request $request)
    {
        $data = $request->reply;
        // Mail::to($request->input('email'))->send(new MessageMail($data));
        Message::find($request->message_id)->update([
            'reply' => $data,
            'sts' => 1,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Message Has been Replied',
        ]);
    }

    function create_quote(Request $request)
    {
        Quote::create([
            'time' => $request->time,
            'date' => $request->date,
            'phone' => $request->phone,
            'name' => $request->name,
            'email' => $request->email,
            'desp' => $request->desp,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Your Message has been sent!',
        ]);
    }

    function quote()
    {
        return view('pages.dashboard.quote');
    }
    function get_quote()
    {
        return Quote::all();
    }
    function delete_quote(Request $request)
    {
        Quote::find($request->quote_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
    function update_quote($quote_id)
    {
        $quote = Quote::find($quote_id);
        $quote->update([
            'sts' => 1,
        ]);
        return view('pages.dashboard.quote_view', compact('quote'));
    }
}
