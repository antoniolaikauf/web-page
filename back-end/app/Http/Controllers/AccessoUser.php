<?php

namespace App\Http\Controllers;

use App\Http\Requests\passwordCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

// tabelle importate
use App\Models\Message;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class AccessoUser extends Controller
{
    public function UserSignin(passwordCheck $request)
    {
        $userData = $request->all(); // ottieni i dati inviati
        // creai un nuovo user
        $NewUser = new User();
        $NewUser->name = $userData['name'];
        $NewUser->email = $userData['email'];
        $NewUser->email_verified_at = now();
        // mettere i validator per password
        $NewUser->password = password_hash($userData['password'], PASSWORD_DEFAULT); // è normale che non sia ritornato nell'oggetto lo nasconde laravel PASSWORD_DEFAULT tipo di algoritmo
        $NewUser->remember_token = Str::random(10);
        // controllo se user gia esistente tramite name e email
        if (User::where('name', '=', $userData['name'])->exists() || User::where('email', '=', $userData['email'])->exists()) return response()->json(['chiamata' => false]);
        else {
            $NewUser->save(); //salvi nel database
            return response()->json([
                'chiamata' => 'riuscita',
                'name' => $NewUser->name,
                'remember_me' => $NewUser->remember_token
            ]);
        }
    }
    public function UserLogin(Request $request)
    {
        // dati ottenuti dal form 
        $userData = $request->all();
        $password = $userData['password'];
        $name = $userData['name'];
        if (Auth::attempt(['name' => $name, 'password' => $password])) { // controllo user esistente 
            $user = Auth::user(); // preso singolo user
            $user = User::find($user['id']);
            if ($userData['remember_me']) $user->remember_token = str::random(10); // cambiato dati se value true
            else  $user->remember_token = null;  // cambiato dati se value false
            $user->save(); //salva dati cambiati
            $passwordUser = hash::check($password, $user->password); // controllo password
            if (!$passwordUser) return response()->json(['chiamata' => false, 'message' => 'password sbagliata']); // controllo password corretta
            else return response()->json(['chiamata' => true, 'message' => $user->fresh(), 'remember_token' => $user->fresh()->remember_token,]);
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

    public function checkToken(Request $request)
    {
        $token = $request->header('Authorization'); // token salvato in localstore
        $check_token = User::where('remember_token', '=', $token)->first(); // cercasi se esiste un user con quel token
        if ($check_token) return response()->json(['chiamata' => true, 'value' => $token]);
        else return response()->json(['chiamata' => false, 'value' => false]);
    }
}
