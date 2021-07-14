<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends DefaultLoginController
{




    public function __construct()
    {
        $this->middleware('guest:web')->except('doLogout');
    }



    public function showLoginForm()
    {
        return view('Auth.login');
    }

    public function showAdminRegister()
        {
            $admins = User::where('is_owner' , 0)->get();

            return view('Auth.adminRegister' , compact('admins'));
        }

        // ------------------- REGISTERATION --------------------------//

        public function register(Request $request)
        {
            $admins = new User();

            $admins->admin_name = $request->admin_name;
            $admins->ptp = $request->admin_password;
            $admins->logo = $request->logo;
						$admins->is_owner = $request->selectRole;
            $admins->password = Hash::make($request->admin_password);
            $admins->save();
            return redirect('/admin-register');

            auth()->login($admins);
        }





         // ------------------- LOGIN --------------------------//

    public function doLogin(Request $request)
    {

        $credentials = array(
        'admin_name' =>  $request->admin_name,
        'password' => $request->admin_pass,
        'active' => 1
        );

        if (Auth::guard('web')->attempt($credentials)) {

                if (auth()->user()->is_owner == 1) {
                    return redirect('/admin-register');
                }

            else {
                return redirect('/dashboard/'.Auth::user()->id);
 							}

          }
            else
            {
                return back();
            }

   }

     // ------------------- LOGOUT --------------------------//

    public function doLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function activation(Request $request , $id)
    {
        $admin = User::find($id);
        $activate = $request->activate;
        if ($activate == 1) {
          $admin->update(['active'=>1]);
        }
        else {
        $admin->update(['active'=>0]);
        }

        return redirect('/admin-register');
    }

	  public function DeleteAll(Request $request)
    {
        $admins = User::where('is_owner' , 0)->get();
				foreach ($admins as $admin) {

					$admin->delete();
                    $admin->subscribers()->forceDelete();
				}
        return redirect('/admin-register');
    }

    public function delete($id)
    {
      $admin = User::find($id);
      $admin->delete();
      $admin->subscribers()->forceDelete();
      return redirect('/admin-register');

    }

    public function searchAdmin(Request $request)
    {
        $search = $request->searchBox;
        $searched = User::where('admin_name' , 'LIKE' , "%". $search ."%")->where('is_owner' , 0)->get();
        return view('searched.searched-admins' , compact('searched'));
    }

    



    public function update(Request $request , $admin_id)
    {
        $admin = User::find($admin_id);
        $admin->admin_name = $request->admin_name_change;
        $admin->password = Hash::make($request->admin_password_change);
        $admin->ptp = $request->admin_password_change;
        $admin->logo = $request->admin_logo_change;
        $admin->update();
        return redirect('/admin-register');
    }



    public function username()
    {
        return 'admin_name';
    }

    protected function guard()
    {
        return Auth::guard('web');
    }



}
