<?php

namespace App\Http\Controllers\Province;

use App\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SearchProvinceController extends Controller
{
    function __invoke(Request $request)
    {
        $status = false;
        $search = $request->input('name_province');
        $zone_id = $request->input('zone_id');

        if ($process = Province::with(['zone'])
            ->where('name_province','like',"%".$search."%")
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
