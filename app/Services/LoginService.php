<?php 

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginService
{

    public function login($data)
    {
        $credentials = [
            'card_number'       => $data['card_number'],
            'pin'               => $data['pin'],
        ];

        $user = User::where('card_number', $credentials['card_number'])->first();

        if ($user && Hash::check($credentials['pin'], $user->pin)) {
            Auth::login($user); // Initialize user session
            return true;
        }else{
            return false;
        }
    }

}

?>