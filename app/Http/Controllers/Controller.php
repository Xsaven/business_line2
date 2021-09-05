<?php

namespace App\Http\Controllers;

use App\Jobs\AdminStatisticJob;
use Bfg\Route\Attributes\Get;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Logout
     */
    public function logout()
    {
        \Cache::forget("n:user:session:" . \Auth::id());

        \Auth::user()->update(['session' => null]);

        \Auth::logout();

        \Session::flush();

        AdminStatisticJob::dispatch();

        return redirect()->route('login');
    }
}
