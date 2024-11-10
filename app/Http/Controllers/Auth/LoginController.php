<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Audittrail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\Toaster;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Adding the username method to determine the field used for authentication
    public function username()
    {
        $login = request()->input('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$field => $login]);
        return $field;
    }

    // Overriding the login method
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function authenticated(Request $request, $user)
    {
        if (Auth::user()->role_as == '1') {
            $currentUser = Auth::user();
            if ($currentUser && ($currentUser->role_as == 1)) {
                $auditlog = new Audittrail;
                $auditlog->user_id = $currentUser->id;
                $auditlog->user_type = 'Admin';
                $auditlog->activity_name = 'Logged in';
                $auditlog->activity_details = 'Logging-in admin user.';
                $auditlog->save();
            }
            return redirect('admin/dashboard')->with('message', 'Welcome to Admin Dashboard');
        } else {
            $currentUser = Auth::user();
            if ($currentUser && ($currentUser->role_as == 0)) {
                $auditlog = new Audittrail;
                $auditlog->user_id = $currentUser->id;
                $auditlog->user_type = 'User';
                $auditlog->activity_name = 'Logged in';
                $auditlog->activity_details = 'Logging-in user.';
                $auditlog->save();
            }
            return redirect('client/homepage')->with('message', 'Logged in successfully');
        }
    }
}
