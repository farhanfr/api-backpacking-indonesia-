<?php

namespace App\Http\Controllers\city;

use App\City;
use App\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GetCityByIdProvince extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'province_id' => 'required'
        ]);


        if($validator->fails()) {
            return $this->response()->failMessage($validator->errors()->all());
        }

        $idProv = $request->input('province_id');

        if(!$prov = Province::where([
            ['id','=',$idProv],
        ])->first()) {

            return $this->response()->failMessage(['Sorry, This province is not available yet']);

        }

        if(!$city = City::with(['province'])->where('province_id','=',$idProv)->get()) {

            return $this->response()->failMessage(['Sorry, city you are looking not available']);

        }

        return $this->response()->successData('Success to get city','data',$city);
    }
}
