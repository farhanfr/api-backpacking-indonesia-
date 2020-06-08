<?php

namespace App\Http\Controllers\destination;

use App\City;
use App\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GetDestinationByIdCity extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'city_id' => 'required'
        ]);


        if($validator->fails()) {
            return $this->response()->failMessage($validator->errors()->all());
        }

        $cityId = $request->input('city_id');

        if(!$city = City::where([
            ['id','=',$cityId],
        ])->first()) {

            return $this->response()->failMessage(['Sorry, This cities is not available yet']);

        }

        if(!$destination = Destination::with(['city'])->where('city_id','=',$cityId)->first()) {

            return $this->response()->failMessage(['Sorry, destination you are looking not available']);

        }

        return $this->response()->successData('Success to get destination','data',$destination);
    }
}
