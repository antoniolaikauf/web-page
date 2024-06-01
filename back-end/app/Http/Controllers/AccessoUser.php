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
    public function UserSignin(Request $request)
    {
        $userData = $request->all(); // ottieni i dati inviati
        // creai un nuovo user
        $NewUser = new User();
        $NewUser->name = $userData['name'];
        $NewUser->email = $userData['email'];
        $NewUser->email_verified_at = now();
        $NewUser->password = password_hash($userData['password'], PASSWORD_DEFAULT); // è normale che non sia ritornato nell'oggetto lo nasconde laravel PASSWORD_DEFAULT tipo di algoritmo
        $NewUser->remember_token = Str::random(10);
        // controllo se user gia esistente tramite name e email
        if (User::where('name', '=', $userData['name'])->exists() || User::where('email', '=', $userData['email'])->exists()) return response()->json(['chiamata' => false]);
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
    public function UserLogin(Request $request)
    {
        // dati ottenuti dal form 
        $userData = $request->all();
        $password = $userData['password'];
        $name = $userData['name'];
        if (User::where('name', '=', $name)->exists()) { // controllo user esistente 
            $check = User::where('name', '=', $name)->get(); // preso singolo user
            $passwordUser = hash::check($password, $check[0]->password); // controllo password
            if (!$passwordUser) return response()->json(['chiamata' => false, 'message' => 'password sbagliata']); // controllo password corretta
            else return response()->json(['chiamata' => true, 'message' => 'accesso riuscito']);
        } else return response()->json(['chaimata' => false, 'message' => 'nome non esistente']);
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
