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
        // $idUser=User::find()
        $newMessage = new message();
        $newMessage->content = $data['messageUser'];
        $newMessage->user_id=
        $selectUser->message()->associate($newMessage);
        return response()->json(['risposta' => 'funziono']);
    }
}
