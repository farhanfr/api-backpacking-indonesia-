<?php

namespace App\Http\Controllers\province;

use App\Province;
use App\Zone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GetProvinceByIdZone extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'zone_id' => 'required'
        ]);


        if($validator->fails()) {
            return $this->response()->failMessage($validator->errors()->all());
        }

        $idZone = $request->input('zone_id');

        if(!$user = Zone::where([
            ['id','=',$idZone],
        ])->first()) {

            return $this->response()->failMessage(['Sorry2, This zones is not available yet']);

        }

        if(!$province = Province::with(['zone'])->where('zone_id','=',$idZone)->get()) {

            return $this->response()->failMessage(['Sorry, province you are looking not available']);

        }

        return $this->response()->successData2($province);
    }
}
