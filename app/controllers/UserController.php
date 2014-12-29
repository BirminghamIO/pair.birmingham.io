<?php

class UserController extends BaseController {

	public function index()
	{
		return View::make('user');
	}
    
    public function settings()
	{
		return View::make('account');
	}
    
    public function changePassword() {
        $password = Input::get('password');
        $re_password = Input::get('re_password');

        $rules = array(
            array(
                'password' => $password,
                're_password' => $re_password
            ),
            array(
                'password' => 'required|min:6|max:64',
                're_password' => 'required|min:6|max:64'
            )
        );
        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails())
        {
            return Redirect::to('account')->withErrors($validator);
        }

        $user = User::find(Auth::user()->id);
        $user->password = $password;
        if($user->save()) return Redirect::to('account')->withErrors($validator);
        else return Redirect::to('account')->withMessage(Lang::get('messages.password_changed'), 'success');
    }

}