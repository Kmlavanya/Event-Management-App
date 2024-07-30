<?php 

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle user authentication and redirect based on role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
{
    // Log::info('User authenticated', ['user' => $user]);
    if ($request->role == $user->role) {
        if ($user->role === 'admin') {
        return redirect('/admin');
        } else if ($user->role === 'user') {
        return redirect('/user');
        }
    }
    // Fallback redirect if role does not match
    return redirect('/login')->with('error', 'Role does not exist or is not assigned correctly.');
}

}
