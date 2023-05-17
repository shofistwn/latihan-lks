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
                    ->where('spots.regional_id', $regionalId)
                    ->get();

                $vaccines = Vaccine::all();

                foreach ($spots as $key => $spot) {
                    $data[$key]['id'] = $key + 1;
                    $data[$key]['name'] = $spot['name'];
                    $data[$key]['address'] = $spot['address'];
                    $data[$key]['serve'] = $spot['serve'];
                    $data[$key]['capacity'] = $spot['capacity'];

                    foreach ($vaccines as $item) {
                        $vaccine[$item['name']] = $spot['vaccine_id'] == $item['id'] ? true : false;
                    }
                    $data[$key]['available_vaccines'] = $vaccine;
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