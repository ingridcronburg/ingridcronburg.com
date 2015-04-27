<?php namespace Dashboard;

class HomeController extends \BaseController {

	public function index()
	{
		return \View::make('dashboard.index');
	}

	public function login()
	{
		return \View::make('dashboard.login');
	}

	public function authenticate()
	{
		$validator = \Validator::make(\Input::all(), [
			'email'    => ['required', 'email'],
			'password' => ['required']
		]);

		if ($validator->passes())
		{
			if (\Auth::attempt(\Input::only('email', 'password')))
			{
				return \Redirect::intended('dashboard');
			}
			else
			{
				return \Redirect::to('dashboard/login')
												->withMessage('Incorrect email or password.')
												->withInput(\Input::except('password'));
			}
		}
		else
		{
			return \Redirect::to('dashboard/login')
											->withErrors($validator)
											->withInput(\Input::except('password'));
		}
	}

	public function logout()
	{
		\Auth::logout();
		return \Redirect::to('dashboard/login');
	}

}
