<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

// tabelle importate
use App\Models\Message;
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
        $NewUser->password = password_hash($userData['password'], PASSWORD_DEFAULT); // è normale che non sia ritornato nell'oggetto lo nasconde laravel 
        $NewUser->remember_token = Str::random(10);
        // controllo se user gia esistente
        if (User::where('name', '=', $userData['name'])->exists()) return response()->json(['chiamata' => false]);
        else {
            $NewUser->save(); //salvi nel database
            if ($NewUser) {
                return response()->json([
                    'chiamata' => 'riuscita',
                    'name' => $NewUser->name,
                ]);
            }
        }
    }
    public function UserSignin(Request $request)
    {
        // dati ottenuti dal form 
        $userData = $request->all();
        $password = $userData['password'];
        $name = $userData['name'];
        $check = User::where('name', '=', $name)->get(); // preso singolo user
        $id = User::find($check[0]['id']);  // trova quello corretto
        $passwordUser = Hash::check($password, $id->password); // controllo password
        if (!count($check) || !$passwordUser) return response()->json(['risposta' => 'ti devi registrare']);
        else {
            return response()->json([
                'chiamata' => 'riuscita',
                'risposta' => $id,
                'dati' => $check,
            ]);
        }
    }
    public function deleteAccount(Request $request)
    {

        $dataUser = $request->all(); // ottieni dati
        $singleUser = $dataUser['name'];
        $user = User::where('name', '=', $singleUser)->get(); //cerca user
        $user[0]->messages()->delete(); //elimina messaggi
        $user[0]->delete(); // elimina user

        return response()->json([
            'chiamata' => 'account eliminato',
        ]);
    }
}
