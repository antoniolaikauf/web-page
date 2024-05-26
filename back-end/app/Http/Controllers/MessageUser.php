<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// tabelle 
use App\Models\Message;
use App\Models\User;

class MessageUser extends Controller
{
    public function Message(Request $request)
    {
        $data = $request->all();
        $userName = $data['nameUser'];
        $selectUser = user::where('name', '=', $userName)->get(); // trova lo user
        $idUser = User::find($selectUser[0]['id']); // trova lo user dal suo id
        $newMessage = new Message();
        $newMessage->content = $data['messageUser'];
        $newMessage->user()->associate($idUser); // associa lo user al messaggio
        $newMessage->save();

        $message = Message::with('user')->orderby('created_at', 'DESC')->get(); // ottieni messaggi con user in ordine temporale

        return response()->json(['risposta' => $message]);
    }

    public function MessageAll() 
    {
        $message = Message::with('user')->orderby('created_at', 'DESC')->get(); // ottieni messaggi con user in ordine temporale
        return response()->json(['risposta' => $message]);
    }
}
