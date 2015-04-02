<?php namespace Dashboard;

use BaseController;
use View;
use Gallery;

class GalleriesController extends BaseController {

	public function index()
	{
		$galleries = Gallery::all();

		return View::make('dashboard.galleries.index', compact('galleries'));
	}

	public function create()
	{
		return View::make('dashboard.galleries.create');
	}

	public function store()
	{
		$name = \Input::get('name');
		$gallery = new Gallery();
		$gallery->name = $name;
		$gallery->save();
		return \Redirect::route('dashboard.galleries.index', compact('galleries'));
	}

	public function edit($id)
	{
		$gallery = Gallery::findOrFail($id);

		return View::make('dashboard.galleries.edit', compact('gallery'));
	}

	public function update($id)
	{
		$name = \Input::get('name');
		$gallery = Gallery::findOrFail($id);
		$gallery->name = $name;
		$gallery->update();
		return \Redirect::route('dashboard.galleries.index', compact('galleries'));
	}

	public function destroy($id)
	{
		$gallery = Gallery::findOrFail($id)->delete();

		return \Redirect::route('dashboard.galleries.index')->withMessage('Gallery deleted.');
	}
}
