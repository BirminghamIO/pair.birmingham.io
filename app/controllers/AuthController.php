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
        else return Redirect::to('login')->withErrors(Lang::get('messages.failed_login'), 'login')->withInput(Input::except('password'));
        
        return Redirect::to('/');
	}
    
    public function loginWithGithub()
	{
        
        //call to OAuth API
        $github = OAuth::consumer('github');

        //if user is returned from GitHub set variables from callback
        if ($code = Input::get('code'))
        {
            $token = $github->requestAccessToken($code);
            $result = json_decode($github->request('user'), true);
            $github_id = $result['id'];
            $github_email = $result['email'];
            $github_login = $result['login'];
            $github_name = $result['name'];
            $github_bio = $result['bio'];
            $github_blog = $result['blog'];

            //create new account if user doesn't exist
            $user = User::where('github_id', '=', $github_id)->first();
            if(!$user->count())
            {
                $user = new User;
                $user->github_id = $github_id;
                if(!empty($github_email)) $user->email = $github_email;
                if(!empty($github_login)) $user->nick = $github_login;
                if(!empty($github_name)) $user->name = $github_name;
                if(!empty($github_bio)) $user->description = $github_bio;
                if(!empty($github_blog)) $user->www = $github_blog;
                $user->active = 1;
                $user->save();
            }
            
            //login user
            Auth::login($user);
            if(Auth::check()) return Redirect::to('/');
            else return Redirect::to('/fatal');
            exit;
        }
        else
        {
            //redirect to github.com to allow authorization
            return Redirect::away((string) $github->getAuthorizationUri());
        }
        
	}
    
    public function logout()
	{
        Auth::logout();
        return Redirect::to('/');
	}

}