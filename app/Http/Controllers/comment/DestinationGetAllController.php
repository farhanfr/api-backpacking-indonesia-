<?php

namespace App\Http\Controllers\Comment;

use App\CommentDestination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DestinationGetAllController extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'city_id' => 'required',
            'destination_id' => 'required'
        ]);


        if($validator->fails()) {
            return $this->response()->failMessage($validator->errors()->all());
        }

        $cityId = $request->input('city_id');
        $destinationId = $request->input('destination_id');

        if ($process = CommentDestination::where('destination_id','like',"%".$destinationId."%")
//            ->where('name_province','like','%'.preg_replace('/\s+/', '', $search).'%')
            ->where('city_id','=',$cityId)
            ->limit(5)
            ->get()){
//            return $this->response()->failMessage(['province not found']);
            if (count($process) > 0){
                return $this->response()->successData('success get comment','data',$process);
            }
            else{
                return $this->response()->successMessage('comment is empty');
            }
        }
    }
}
