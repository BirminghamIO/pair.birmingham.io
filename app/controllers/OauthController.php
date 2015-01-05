<?php

class OauthController extends BaseController {
    
    public function githubConnect()
	{
        $github = OAuth::consumer('github');

        if ($code = Input::get('code'))
        {
            $token = $github->requestAccessToken($code);
            $result = json_decode($github->request('user'), false);
            
            if(!Auth::check()) 
            {
                $user = User::where('email', '=', $result->email)->first();
                
                if(!$user)
                {
                    $user = new User;
                    $user->github_id = $result->id;
                    if(!empty($result->email)) $user->email = $result->email;
                    if(!empty($result->login)) $user->nick = $result->login;
                    if(!empty($result->name)) $user->name = $result->name;
                    if(!empty($result->bio)) $user->description = $result->bio;
                    if(!empty($result->blog)) $user->www = $result->blog;
                    $user->active = 1;
                    $user->save();
                }
                
                $user->github_id = $result->id;
                
                if($user->save()) 
                {
                    Auth::login($user);
                    Session::put('github_user', $result);
                    return Redirect::to('/');
                }
            }
            
            else 
            {
                $user = User::find(Auth::user()->id);
                $user->github_id = $result->id;
                
                if($user->save()) 
                {
                    Session::put('github_user', $result);
                    return Redirect::to('account')
                        ->with('message', Lang::get('messages.github_connected'));
                }
                
                else return Redirect::to('account')
                    ->with('message', Lang::get('messages.github_not_connected'));
            }
        }
        
        else
        {
            return Redirect::away((string) $github->getAuthorizationUri());
        }
        
	}
    
    public function githubDisconnect() 
    {
        $user = User::find(Auth::user()->id);
        $user->github_id = NULL;
        
        if($user->save() && Session::forget('github_user')) 
        {
            return Redirect::to('account')
                ->with('message', Lang::get('messages.github_disconnected'));
        }
        
        else return Redirect::to('account')
            ->with('message', Lang::get('messages.github_not_disconnected'));
    }

}