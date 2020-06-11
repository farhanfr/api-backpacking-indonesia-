<?php

namespace App\Http\Controllers\Destination;

use App\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchDestinationController extends Controller
{
    function __invoke(Request $request)
    {
        $search = $request->input('name_destination');
        $cityId = $request->input('city_id');

        if ($process = Destination::with(['city'])
            ->where('name_destination','like',"%".$search."%")
//            ->where('name_province','like','%'.preg_replace('/\s+/', '', $search).'%')
            ->where('city_id','=',$cityId)
            ->get()){
//            return $this->response()->failMessage(['province not found']);
            if (count($process) > 0){
                return $this->response()->successData2($process);
            }
            else{
                return null;
            }
        }
    }
}
