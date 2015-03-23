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

	public function store() {}

	public function edit($id)
	{
		$gallery = Gallery::find($id);

		return View::make('dashboard.galleries.edit', compact('gallery'));
	}

	public function update() {}

	public function destroy() {}
}
