<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// tabelle importate
use App\Models\message;
use App\Models\User;

class AccessoUser extends Controller
{
    public function Userdati()
    {
        // $user = User::all();
        $user = 'antonioi';

        return response()->json([
            'chiamata' => 'riuscita',
            'User' => $user
        ]);
    }
}
