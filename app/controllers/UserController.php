<?php

class UserController extends BaseController {

	public function index()
	{
		return View::make('user');
	}
    
    public function showProfile($nickOrId) {
        if($user = User::find($nickOrId));
        elseif($user = User::where('nick', '=', $nickOrId)->first());
        else return "nothing to show";
        return View::make('user.profile')->withUser($user);
    }
    
    public function getEdit()
	{
		return View::make('user.edit');
	}
    
    public function postEdit()
	{
		$email = Input::get('email');
        $nick = Input::get('nick');
        $name = Input::get('name');
        $www = Input::get('www');
        $description = Input::get('description');

        $rules = array(
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'nick' => 'required|min:3|unique:users,nick,'.Auth::user()->id,
            'www' => 'url',
        );
        $validator = Validator::make(Input::all(), $rules);
        
        if($validator->fails())
        {
            echo "bad";
            exit;
            return Redirect::to('account')->withErrors($validator);
        }
        
        $user = User::find(Auth::user()->id);
        $user->email = $email;
        $user->nick = $nick;
        $user->name = $name;
        $user->www = $www;
        $user->description = $description;
        if($user->save()) return Redirect::to('account')->with('message', Lang::get('messages.editing_completed'));
        else return Redirect::to('account')->with('message', Lang::get('messages.editing_completed'));
	}
    
    public function getChangePassword() {
        return View::make('user.changePassword');  
    }
    
    public function postChangePassword() {
        $password = Input::get('password');
        $re_password = Input::get('re_password');

        $rules = array(
            'password' => 'required|min:6',
            're_password' => 'required|min:6'
        );
        $validator = Validator::make(Input::all(), $rules);
        
        if($validator->fails())
        {
            return Redirect::to('account/password')->withErrors($validator);
        }
        
        if($password !== $re_password) return Redirect::to('account/password')->withErrors(Lang::get('messages.different_passwords'));
        
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($password);
        if($user->save()) return Redirect::to('account/password')->with('message', Lang::get('messages.password_changed'));
        else return Redirect::to('account/password')->with('message', Lang::get('messages.password_changed'));
    }

}