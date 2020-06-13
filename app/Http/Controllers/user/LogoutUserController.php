<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutUserController extends Controller
{
    public function __invoke(Request $request)
    {
        $idUser = $request->input('id');
        $user = User::find($idUser);
        $user->token = null;
        $user->update();

        return $this->response()->successMessage("success logout");
    }
}
