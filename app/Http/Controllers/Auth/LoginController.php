<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\LogoutRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LoginController extends Controller
{

    /**
     * Show the login page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('timoros.auth.login');
    }

    /**
     * Handle user login request
     *
     * @param LoginRequest $request
     * @return mixed
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $remember = isset($credentials['remember']) ? array_pop($credentials) : false;

        if (!$this->guard()->validate($credentials)):
            return redirect()->to('/timoros/login')->withErrors(trans('auth.failed'));
        endif;

        $user = $this->guard()->getProvider()->retrieveByCredentials($credentials);
        if ($remember):
            $this->guard()->login($user, true);
            $user->setRememberToken(Str::random(60));
        else:
            $this->guard()->login($user);
        endif;

        return $this->authenticated($user);
    }

    /**
     * Send response of user authentication
     *
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticated($user)
    {
        return $user
            ? redirect()->route('admin.index')
            : redirect()->to('/timoros/login')->withErrors(trans('auth.failed'));
    }

    /**
     * Get a Guard instance
     *
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    public function guard()
    {
        return Auth::guard();
    }

    /**
     * handle user logout request
     *
     * @param LogoutRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(LogoutRequest $request)
    {
        $this->guard()->logout();
        return redirect()->to('/timoros/login');
    }
}
