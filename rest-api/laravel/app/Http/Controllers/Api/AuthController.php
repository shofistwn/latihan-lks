<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $authUser = Society::
            where('id_card_number', $request->id_card_number)
            ->where('password', $request->password)
            ->first();

        if (isset($authUser)) {
            $token = md5($authUser->id_card_number);
            $authUser->update([
                'login_tokens' => $token
            ]);

            return response()->json([
                'name' => $authUser->name,
                'born_date' => $authUser->born_date,
                'gender' => $authUser->gender,
                'address' => $authUser->address,
                'token' => $token,
                'regional' => $authUser->regional,
            ]);
        }
        return response()->json([
            'message' => 'ID Card or Password incorrect'
        ], 401);
    }

    public function logout(Request $request)
    {
        if (isset($request->token)) {
            $authUser = Society::where('login_tokens', $request->token)->first();
            if (isset($authUser)) {
                $authUser->update([
                    'login_tokens' => null
                ]);

                return response()->json([
                    'message' => 'Logout success'
                ]);
            }
        }
        return response()->json([
            'message' => 'Invalid token'
        ]);
    }
}