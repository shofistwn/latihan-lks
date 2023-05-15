<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Society;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function reqConsultation(Request $request)
    {
        if (isset($request->token)) {
            $userId = Society::where('login_tokens', $request->token)->first()->id;
            if ($userId) {
                $consultation = Consultation::create([
                    'society_id' => $userId,
                    'disease_history' => $request->disease_history,
                    'current_symptoms' => $request->current_symptoms,
                ]);
                if ($consultation) {
                    return response()->json([
                        'message' => 'Request consultation sent successful'
                    ]);
                }
            }
        }
        return response()->json([
            'message' => 'Unauthorized user'
        ], 401);
    }

    public function getConsultation(Request $request)
    {
        if (isset($request->token)) {
            $userId = Society::where('login_tokens', $request->token)->first()->id;
            if ($userId) {
                $consultation = Consultation::where('society_id', $userId)->first();
                return response()->json([
                    'consultation' => [
                        'id' => $consultation->id,
                        'status' => $consultation->status,
                        'disease_history' => $consultation->disease_history,
                        'current_symptoms' => $consultation->current_symptoms,
                        'doctor_notes' => $consultation->doctor_notes,
                        'doctor' => null,
                    ]
                ]);
            }
        }
        return response()->json([
            'message' => 'Unauthorized user'
        ]);
    }
}