<?php

class HomeController extends BaseController {

	public function home()
	{
		$image = \Gallery\Image::find(19);

		return View::make('home', compact('image'));
	}

	public function portfolio()
	{
		$galleries = \Gallery::where('enabled', 1)->orderBy('sort_order')->get();

		return View::make('portfolio', compact('galleries'));
	}

	public function gallery($id)
	{
		$gallery = \Gallery::findOrFail($id);

		return View::make('gallery', compact('gallery'));
	}
}
