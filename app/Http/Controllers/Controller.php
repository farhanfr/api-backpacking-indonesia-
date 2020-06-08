<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Http\Controllers\province\ProvinceHelper;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function response(){
        return new ResponseHelper();
    }

    public function helper(){
        return new Helper();
    }
}

Class Helper{

    public function province(){
        return new ProvinceHelper();
    }
}
