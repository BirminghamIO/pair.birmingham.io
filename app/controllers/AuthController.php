<?php

class AuthController extends BaseController {

	public function index()
	{
		return View::make('login');
	}
    
    public function login()
	{
        $login = Input::get('login');
        $password = Input::get('password');
        $remember = false;
        
        if (Auth::attempt(array('email' => $login, 'password' => $password, 'active' => 1), $remember));
        elseif(Auth::attempt(array('nick' => $login, 'password' => $password, 'active' => 1), $remember));
        else return Redirect::to('login')
            ->withErrors(Lang::get('messages.failed_login'), 'login')
            ->withInput(Input::except('password'));
        
        return Redirect::to('/');
	}
    
    public function logout()
	{
        Auth::logout();
        return Redirect::to('/');
	}

}