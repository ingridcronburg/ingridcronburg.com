<?php

class GalleriesController extends BaseController {

	public function index()
	{
		$galleries = \Gallery::where('enabled', 1)
												 ->orderBy('sort_order')
												 ->get();

		return \View::make('galleries.index', compact('galleries'));
	}

	public function show($id)
	{
		$gallery = \Gallery::findOrFail($id);

		return \View::make('galleries.show', compact('gallery'));
	}
}
