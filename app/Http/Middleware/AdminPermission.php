<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Route;

class AdminPermission
{

    public function __construct(Guard $auth)
    {

        $this->auth = $auth;

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $segments = $request->segments();
        $segmentCounter = count($segments);

        if ($segmentCounter > 1) {
            $actionName = 'index';
        }

        if ($segmentCounter > 2) {
            $actionName = Str::camel($segments[2]);
        }
        // karbar hatman baiad Login bashad
        if ($this->auth->check()) {
            if ($this->auth->user()->admin) {
                // ghesmate aval URL baiad ba esme admin dar Config barabar bashe
                if ($segments[0] == config('site.admin')) {

                    // agar tedad ghesmat hae url bishtar az 0 bod va safhe aval admin nabood
                    if (($segmentCounter > 1) && Route::currentRouteAction() !== 'App\Http\Controllers\Admin\ContentController@getAdmin') {
                        foreach ($this->auth->user()->roles as $role) {



                            // permission ha be sorat array
                            $permission = unserialize($role->permission);
                            if (is_array($permission)) {
                                if ($permission['fullAccess'] == 1) {
                                    return $next($request);
                                }
                                // agar url bishtar az 1 ghesmat bood va ghesmate tarif shode toe permision ha bood

                                if (($segmentCounter > 1) && array_key_exists($segments[1], $permission)) {

                                    // agar url faght 2 ghesmat bood maslan /admin/users khode method ro be index taghir mide
                                    if ($segmentCounter == 2) {

                                        $segments[2] = 'index';
                                        //return $next($request);
                                    }

                                    // agar bishtar az 2 ghesmat bood

                                    if ((count($segments) > 2) && array_key_exists($actionName, $permission[$segments[1]])) {
// dd('dddd');
                                        return $next($request);
                                    }
                                }
                            }
                        }
                        // agar segment bozorgtar az 0 bood va safhe aval admin bood
                    } elseif (($segmentCounter > 0) && Route::currentRouteAction() == 'App\Http\Controllers\Admin\ContentController@getAdmin') {
                        return $next($request);
                    }
                }
            }
        }
        if ($request->ajax()) {
            return response('Unauthorized.', 401);
        } else {
            if (Auth::check() and Auth::user()->admin) {
                return redirect('/admin')->with('error', 'شما به این بخش دسترسی ندارید.');
            } else {
                return redirect()->action('Admin\LoginController@getLogin');
            }
        }
    }


}
