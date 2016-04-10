<?php

class PostsController extends BaseController {

	public function index()
	{
		$posts = \Post::all();

		return \View::make('posts.index', compact('posts'));
	}

	public function show($id, $slug = null)
	{
		$post = \Post::findOrFail($id);

		return \View::make('posts.show', compact('post'));
	}
}
