<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

// tabelle importate
use App\Models\message;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class AccessoUser extends Controller
{
    public function UserLogin(Request $request)
    {
        $userData = $request->all(); // ottieni i dati inviati
        // creai un nuovo user
        $NewUser = new User();
        $NewUser->name = $userData['name'];
        $NewUser->email = $userData['email'];
        $NewUser->email_verified_at = now();
        $NewUser->password = Hash::make($userData['password']); // normale che non sia ritornato nell'oggetto lo nasconde laravel 
        $NewUser->remember_token = Str::random(10);

        $NewUser->save(); //salvi nel database
        if ($NewUser) {
            return response()->json([
                'chiamata' => 'riuscita',
                'name' => $NewUser->name,
            ]);
        }
    }
    public function UserSignin(Request $request)
    {
        $userData = $request->all();
        
        return response()->json([
            'chiamata' => 'riuscita',
            'risposta' => $userData,
        ]);
    }
}
