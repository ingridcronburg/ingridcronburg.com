<?php

class HomeController extends BaseController {

	public function index()
	{
		$image = \Image::find(19);

		return \View::make('home', compact('image'));
	}

	public function contact()
	{
		return \View::make('contact');
	}

}
