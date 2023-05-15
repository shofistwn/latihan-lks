<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Society;
use App\Models\Spot;
use App\Models\SpotVaccine;
use App\Models\Vaccination;
use App\Models\Vaccine;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    public function spotsByRegion(Request $request)
    {
        if (isset($request->token)) {
            $regionalId = Society::where('login_tokens', $request->token)->first()->regional->id;
            if ($regionalId) {
                $spots = SpotVaccine::join('spots', 'spot_vaccines.spot_id', '=', 'spots.id')
                    ->get();

                $data = null;
                foreach ($spots as $key => $value) {
                    $data[$key]['id'] = $key + 1;
                    $data[$key]['name'] = $value['name'];
                    $data[$key]['address'] = $value['address'];
                    $data[$key]['serve'] = $value['serve'];
                    $data[$key]['capacity'] = $value['capacity'];
                    $data[$key]['available_vaccines'] = [];
                }
                return response()->json([
                    'spots' => $data
                ]);
            }
        }
        return response()->json([
            'message' => 'Unauthorized user'
        ]);
    }

    public function spotByIdAndDate($spot_id, Request $request)
    {
        if (isset($request->token)) {
            $authUser = Society::where('login_tokens', $request->token)->first();
            if ($authUser) {
                $spot = Spot::find($spot_id);
                $vaccinations_count = Vaccination::where('spot_id', $spot->id)
                    ->where('date', $request->date)
                    ->count();

                $date = $request->date;
                if (!isset($date)) {
                    $date = date('Y-m-d');
                }
                return response()->json([
                    'date' => Carbon::createFromFormat('Y-m-d', $date)->format('M d, Y'),
                    'spot' => $spot,
                    'vaccinations_count' => $vaccinations_count
                ]);
            }
        }
        return response()->json([
            'message' => 'Unauthorized user'
        ]);
    }
}