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
		$gallery->name       = \Input::get('name');
		$gallery->enabled    = 0;
		$gallery->sort_order = 0;
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
		$gallery->name    = \Input::get('name');
		$gallery->enabled = \Input::has('enabled');
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

	public function order()
	{
		$gallery_ids = \Input::get('ids');

		$galleries = Gallery::whereIn('id', $gallery_ids)->get();

		foreach($gallery_ids as $sort_order => $gallery_id)
		{
			$gallery = $galleries->find($gallery_id);
			$gallery->sort_order = $sort_order;
			$gallery->save();
		}

		return \Response::make(null, 200);
	}

}
