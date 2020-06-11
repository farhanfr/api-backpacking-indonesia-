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

        if ($process = Province::with(['zone'])
            ->where('name_province','like',"%".$search."%")
            ->orWhere('name_province','like','%'.preg_replace('/\s+/', '', $search).'%')
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
