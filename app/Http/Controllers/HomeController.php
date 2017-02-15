<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Jobs\SendWelcomeEmail;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Mail;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('adminlte::home');
    }
	
	public function send()
    {
//         Log::info("Request Cycle with Queues Begins");
        for($i = 0; $i<50; $i++){
            $this->dispatch(new SetTeamData());
//        Log::info("Request Cycle with Queues Ends");
        }
		echo "event added to queue";
    }
}