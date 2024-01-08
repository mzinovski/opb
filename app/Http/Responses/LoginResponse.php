<?php
 
namespace App\Http\Responses;
 
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
 
class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
    	if(auth()->user()->isBanned()) {
    		auth()->logout();
        	return redirect()->route('login')->with('error', 'Корисникот има забрана за логирање.');
    	}

        $home = auth()->user()->hasRole(['admin', 'editor']) ? '/dashboard' : '/';
        return redirect($home);
    }
}