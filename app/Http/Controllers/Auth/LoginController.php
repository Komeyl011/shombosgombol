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

    protected function roles()
    {
        return [
            'platform.systems.roles',
            'platform.systems.attachment',
            'platform.systems.users',
            'platform.systems.index',
        ];
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

        $roles = [];
        $user = $this->guard()->getProvider()->retrieveByCredentials($credentials);
        if (!is_null($user->permissions)) {
            foreach (json_decode($user->permissions, true) as $key => $value) {
                foreach ($this->roles() as $role) {
                    if ($role == $key && $value) {
                        $roles[] = $role;
                    }
                }
            }
        }

        if ($remember):
            $this->guard()->login($user, true);
            $user->setRememberToken(Str::random(60));
        else:
            $this->guard()->login($user);
        endif;

        return $this->authenticated($user, $roles);
    }

    /**
     * Send response of user authentication
     *
     * @param $user
     * @param array $roles
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticated($user, array $roles)
    {
        if ($user):
            if (count($roles) > 0):
                return redirect()->route('admin.index');
            else:
                return redirect()->route('home');
            endif;
        else:
            return redirect()->to('/timoros/login')->withErrors(trans('auth.failed'));
        endif;
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
