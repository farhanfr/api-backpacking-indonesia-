<?php

namespace App\Http\Controllers\City;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchCityController extends Controller
{
    function __invoke(Request $request)
    {
        $search = $request->input('name_city');
        $province_id = $request->input('province_id');

        if ($process = City::with(['province'])
            ->where('name_city','like',"%".$search."%")
//            ->where('name_province','like','%'.preg_replace('/\s+/', '', $search).'%')
            ->where('province_id','=',$province_id)
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
