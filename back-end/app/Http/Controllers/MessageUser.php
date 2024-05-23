<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// tabelle 
use App\Models\message;
use App\Models\User;

class MessageUser extends Controller
{
    public function Message(Request $request)
    {
        $data = $request->all();
        $userName = $data['nameUser'];
        $selectUser = user::where('name', '=', $userName)->get();
        $idUser = User::find($selectUser[0]['id']);

        $newMessage = new Message();
        $newMessage->content = $data['messageUser'];
        $newMessage->user()->associate($idUser);
        $newMessage->save();
        $messages = message::all();
        return response()->json(['risposta' => $messages]);
    }
}
