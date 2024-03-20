<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Models\User;

class MessageController extends Controller
{
    public function sendMessageForm()
{
    // Fetch type 2 users
    $type2Users = User::where('type', 2)->get();
    
    $messages = Message::where('receiver_id', auth()->id())->get();

    return view('admin.send_message', compact('type2Users', 'messages'));
}


    public function sendMessage(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'receiver_id' => 'required',
            'message' => 'required',
        ]);

        // Create a new message
        Message::create([
            'sender_id' => auth()->id(), // Assuming sender is the authenticated user
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    public function displayMessages()
    {
        $messages = Message::where('receiver_id', auth()->id())->get();

        return view('creator.display_messages', compact('messages'));
    }

    public function deleteMessage($id)
    {
        $message = Message::findOrFail($id);


        if ($message->sender_id == auth()->id()) {
            $message->delete();
            return redirect()->back()->with('success', 'Message deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'You are not authorized to delete this message!');
        }
    }
}
