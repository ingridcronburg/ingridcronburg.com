<?php

class HomeController extends BaseController {

	public function index()
	{
		return \View::make('home');
	}

	public function web()
	{
		return \View::make('web');
	}

	public function about()
	{
		return \View::make('about');
	}

}
