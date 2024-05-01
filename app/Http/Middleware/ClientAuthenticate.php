<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;

class ClientAuthenticate extends Middleware
{
   /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        try{

            if (! $request->expectsJson()) {

                return route('clients.login');
                
            }else{

                Auth::user()->role = Role::where('id',Auth::user()->role_id)->get()->first();
            }

        }catch(\Exception $exception){

            return response()->json([
                'status' => false,
                'message' => 'token expired'
            ]);
        }
        
    }
}
