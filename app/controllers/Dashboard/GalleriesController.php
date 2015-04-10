<?php namespace Dashboard;

use View;
use Gallery;
use BaseController;

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
		$gallery = new Gallery();
		$gallery->name = \Input::get('name');
		$gallery->save();

		return \Redirect::route('dashboard.galleries.index')->withMessage('Gallery created.');
	}

	public function edit($id)
	{
		$gallery = Gallery::findOrFail($id);

		return View::make('dashboard.galleries.edit', compact('gallery'));
	}

	public function update($id)
	{
		$gallery = Gallery::findOrFail($id);
		$gallery->name = \Input::get('name');
		$gallery->update();

		return \Redirect::route('dashboard.galleries.index')->withMessage('Gallery updated.');
	}

	public function destroy($id)
	{
		$gallery = Gallery::findOrFail($id);

		$gallery->images->each(function($image)
		{
			$image->deleteS3File();
			$image->delete();
		});

		$gallery->delete();

		return \Redirect::route('dashboard.galleries.index')->withMessage('Gallery deleted.');
	}

}
