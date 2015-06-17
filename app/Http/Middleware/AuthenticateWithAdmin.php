<?php namespace CodeCommerce\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AuthenticateWithAdmin
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
        } else {
            if (!$this->auth->user()->is_admin)
            {


                return redirect()->guest('home')->with('message', 'Recurso disponível somente para administradores');;

            }
        }

        return $next($request);
    }

}
