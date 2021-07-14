<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Subscriber;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Crypt;

class DashController extends Controller
{


	public function __construct()
    {
        $this->middleware('auth:web')->except('test');
    }

    public function showDashboard($user_id)
    {
    	$user_id = Auth::user()->id;
    	$admins = User::find($user_id);
    	$subscribers = Subscriber::where('user_id' , $user_id)->get();
    	$time = Carbon::now()->toDateString();
    		
		return view('dashboard.main-dash' , compact('admins' , 'subscribers' , 'time'));
	}

	public function getData($user_id)
	{	
		$user_id = Auth::user()->id;
		$admins = User::find($user_id);
		$subCount = Subscriber::where('user_id' , $user_id)->count();
		$oldSub = Subscriber::whereMonth('created_at' , Carbon::now()->submonth())->count();
		$result = $subCount - $oldSub; 
		$pay = Subscriber::where('user_id' , $user_id)->sum('price');
		$oldPays = Subscriber::where('user_id' , $user_id)
							   ->whereMonth('created_at' , Carbon::now()
							   ->submonth())->sum('price');

		$monthlyEarning = $pay - $oldPays;					   
    		
		return view('dashboard.data-dash',compact('subCount' , 'admins' , 'result' , 'pay' , 'monthlyEarning'));
	}

	public function getDeletedUser($user_id)
	{
		$user_id = Auth::user()->id;
		$admins = User::find($user_id);
		$subscribers = Subscriber::onlyTrashed()->where('user_id' , $user_id)->get();
		return view('dashboard.del-dash' , compact('admins' ,'subscribers'));
	}


//____________________________________________________________________________//


	public function test()
		{
			
			return Subscriber::onlyTrashed()->get();
		}

		public function ddd($subscriber_id)
		{	
			
			return Subscriber::where('id' , $subscriber_id)->get();
		}			

}
