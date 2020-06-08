<?php

namespace App\Http\Controllers\province;

use App\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetAllController extends Controller
{
    public function __invoke()
    {
        $province = Province::with(['zone'])->get();
        return $this->response()->successData('Success get province','data',$province);
    }
}
