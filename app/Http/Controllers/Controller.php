<?php

namespace App\Http\Controllers;

use Bfg\Route\Attributes\Get;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//    #[Get('password_reset', 'password.reset')]
//    public function reset_password()
//    {
//        return ['success' => 'ok'];
//    }
}
