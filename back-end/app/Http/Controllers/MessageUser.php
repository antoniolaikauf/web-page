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

        $users = User::with('messages')->get(); // ottieni messaggi con user

        return response()->json(['risposta' => $users]);
    }
}
