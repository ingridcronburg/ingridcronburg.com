<?php namespace Dashboard;

use BaseController;
use View;

class HomeController extends BaseController {

	public function index()
	{
		return View::make('dashboard.index');
	}

}
