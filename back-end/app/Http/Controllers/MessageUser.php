<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageUser extends Controller
{
    public function Message(Request $request)
    {
        $message = $request->all();
        $messageUser = $message['messageUser'];
        return response()->json(['risposta' => $messageUser]);
    }
}
