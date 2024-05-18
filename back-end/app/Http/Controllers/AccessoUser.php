<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// tabelle importate
use App\Models\message;
use App\Models\User;

class AccessoUser extends Controller
{
    public function Userdati(Request $request)
    {
        $userData = $request->all(); // ottieni i dati inviati
        // creai un nuovo user
        $NewUser = new User();
        $NewUser->name = $userData['name'];
        $NewUser->email = $userData['email'];
        $NewUser->email_verified_at = now();
        $NewUser->password = $userData['password']; // normale che non sia ritornato nell'oggetto lo nasconde laravel 
        // $NewUser->messages()->associate()
        // $NewUser->save(); //salvi nel database

        return response()->json([
            'chiamata' => 'riuscita',
            'User' => $NewUser
        ]);
    }
}
