<?php

namespace App\Http\Controllers\Comment;

use App\CommentDestination;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DestinationAddController extends Controller
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'city_id' => 'required',
            'user_id' => 'required',
            'destination_id' => 'required',
            'comment' => 'required'
        ]);

        if($validator->fails()){
            return $this->response()->failMessage($validator->errors()->all());
        }

        $data = [
            'city_id' => $request->input('city_id'),
            'destination_id' => $request->input('destination_id'),
            'user_id' => $request->input('user_id'),
            'comment' => $request->input('comment')
        ];

//        if(!UserType::find($data['type'])){
//            return $this->response()->failMessage(['Sorry, User Type you are looking not found']);
//        }
//
//        if($this->helper()->user()->isAvailableUserId($data['user_id'])) {
//            return $this->response()->failMessage(['Sorry,This User Id already registered']);
//        }
//
//        if($this->helper()->user()->isAvailableEmail($data['email'])) {
//            return $this->response()->failMessage(['Sorry,This email already registered']);
//        }

        $this->create($data);

        return $this->response()->successMessage('Success to add comment');
    }

    private function create($data) {
        CommentDestination::insert([
                'city_id' => $data['city_id'],
                'destination_id' => $data['destination_id'],
                'user_id' => $data['user_id'],
                'comment' => $data['comment'],
                'comment_date' => Carbon::now()
        ]);

    }
}
