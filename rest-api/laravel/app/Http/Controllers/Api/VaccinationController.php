<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Society;
use App\Models\Vaccination;
use Illuminate\Http\Request;

class VaccinationController extends Controller
{
    public function registrationVaccination(Request $request)
    {
        if (isset($request->token)) {
            $userId = Society::where('login_tokens', $request->token)->first()->id;
            if ($userId) {
                $checkDose = Vaccination::where('society_id', $userId)->first();
                if (isset($checkDose)) {
                    // if ($checkDose->date < ) {
                    //     # code...
                    // }
                } else {
                    $vaccination = Vaccination::create([
                        'dose' => 1,
                        'date' => $request->date,
                        'society' => $userId,
                    ]);
                }
            }
        }
    }
}