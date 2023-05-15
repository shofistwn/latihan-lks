<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['id_card_number' => $request->id_card_number, 'password' => $request->password])) {
            $authUser = Auth::user();
            $token = md5($authUser->id_card_number);
            $authUser->update([
                'login_tokens' => $token
            ]);

            $user = [
                'name' => $authUser->name,
                'born_date' => $authUser->born_date,
                'gender' => $authUser->gender,
                'address' => $authUser->address,
                'token' => $authUser->login_tokens,
                'regional' => $authUser->regional_id,
            ];

            return response()->json([$user]);
        }
        return response()->json([
            'message' => 'ID Card Number or Password incorrect'
        ], 401);
    }
}