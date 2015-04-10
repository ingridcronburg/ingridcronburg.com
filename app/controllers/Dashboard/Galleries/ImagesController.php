<?php namespace Dashboard\Galleries;

use View;
use Gallery;
use Gallery\Image;
use BaseController;

class ImagesController extends BaseController {

  public function create($gallery_id)
  {
    $gallery = Gallery::findOrFail($gallery_id);

    return View::make('dashboard.galleries.images.create', compact('gallery'));
  }

  public function store($gallery_id)
  {
    $gallery = Gallery::findOrFail($gallery_id);

    $image = new Image();
    $image->title    = \Input::get('title');
    $image->location = \Input::get('location');

    if (\Input::hasFile('photo'))
    {
      $filename = \Input::file('photo')->getClientOriginalName();
      $source   = \Input::file('photo')->getRealPath();
      $type     = \Input::file('photo')->getMimeType();

      $image->filename = $filename;
      $image->saveS3File($filename, $source, $type);
    }

    $gallery->images()->save($image);

    return \Redirect::route('dashboard.galleries.edit', [$gallery_id])->withMessage('Image created.');
  }

  public function edit($gallery_id, $id)
  {
    $gallery = Gallery::findOrFail($gallery_id);
    $image = $gallery->images()->findOrFail($id);

    return View::make('dashboard.galleries.images.edit', compact('gallery', 'image'));
  }

  public function update($gallery_id, $id)
  {
    $gallery = Gallery::findOrFail($gallery_id);
    $image = $gallery->images()->findOrFail($id);
    $image->title    = \Input::get('title');
    $image->location = \Input::get('location');

    if (\Input::hasFile('photo'))
    {
      $image->deleteS3File();

      $filename = \Input::file('photo')->getClientOriginalName();
      $source   = \Input::file('photo')->getRealPath();
      $type     = \Input::file('photo')->getMimeType();
      $image->filename = $filename;

      $image->saveS3File($filename, $source, $type);
    }
    elseif (\Input::has('delete_photo'))
    {
      $image->deleteS3File();
    }

    $image->update();

    return \Redirect::route('dashboard.galleries.edit', $gallery_id)->withMessage('Image updated.');
  }

  public function destroy($gallery_id, $id)
  {
    $gallery = Gallery::findOrFail($gallery_id);
    $image = $gallery->images()->findOrFail($id);

    $image->deleteS3File();
    $image->delete();

    return \Redirect::route('dashboard.galleries.edit', $gallery_id)->withMessage('Image deleted.');
  }

}
