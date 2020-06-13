<?php

namespace App\Http\Controllers\Destination;

use App\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchDestinationQuick extends Controller
{
    public function __invoke(Request $request)
    {
        $search = $request->input('name_destination');
        $zone_id = $request->input('zone_id');

        if ($process = Destination::with(['city'])
            ->where('name_destination','like',"%".$search."%")
//            ->where('name_province','like','%'.preg_replace('/\s+/', '', $search).'%')
            ->where('zone_id','=',$zone_id)
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
