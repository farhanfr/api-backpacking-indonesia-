<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Exception;

class LoginUserController extends Controller
{
    public function __invoke(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $data=[
            'username'=>$username,
            'password'=>$password
        ];

        try {

            $user = $this->login($data);

            $secret = Hash::make($user);

            $user->token = $secret;
            $user->save();

            $data = [
                'secret' => $secret,
                'user' => $user
            ];

            return $this->response()->successData('Success to login','data',$data);

        }catch (Exception $exception) {

            return $this->response()->failMessage([$exception->getMessage()]);

        }

    }

    public function login($data){
        if(!$user = User::where([
            ['username','=',$data['username']]
        ])->first()) {
            throw new Exception('Sorry, User Id Not Found');
        }

        if(!Hash::check($data['password'],$user->password)) {
            throw new Exception('Sorry, Password incorrect');
        }

        return $user;

    }
}
