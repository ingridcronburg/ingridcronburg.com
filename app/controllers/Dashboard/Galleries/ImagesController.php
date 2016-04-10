<?php namespace Dashboard\Galleries;

class ImagesController extends \BaseController {

  public function create($gallery_id)
  {
    $gallery = \Gallery::findOrFail($gallery_id);

    return \View::make('dashboard.galleries.images.create', compact('gallery'));
  }

  public function store($gallery_id)
  {
    $validator = \Validator::make(\Input::all(), [
      'title' => ['required'],
      'location' => ['required'],
      'photo' => ['required', 'image']
    ]);

    if($validator->passes())
    {
      $gallery = \Gallery::findOrFail($gallery_id);

      $image = new \Image();
      $image->title    = \Input::get('title');
      $image->location = \Input::get('location');
      $image->enabled    = 0;
  		$image->sort_order = 0;

      if(\Input::hasFile('photo'))
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
    else
    {
      return \Redirect::route('dashboard.galleries.images.create', $gallery_id)
                      ->withErrors($validator)
                      ->withInput();
    }
  }

  public function edit($gallery_id, $id)
  {
    $gallery = \Gallery::findOrFail($gallery_id);
    $image = $gallery->images()->findOrFail($id);

    return \View::make('dashboard.galleries.images.edit', compact('gallery', 'image'));
  }

  public function update($gallery_id, $id)
  {
    $validator = \Validator::make(\Input::all(), [
      'title' => ['required'],
      'location' => ['required'],
      'photo' => ['required', 'image']
    ]);

    if($validator->passes())
    {
      $gallery = \Gallery::findOrFail($gallery_id);
      $image = $gallery->images()->findOrFail($id);
      $image->title    = \Input::get('title');
      $image->location = \Input::get('location');
      $image->enabled  = \Input::has('enabled');

      if(\Input::hasFile('photo'))
      {
        $image->deleteS3File();

        $filename = \Input::file('photo')->getClientOriginalName();
        $source   = \Input::file('photo')->getRealPath();
        $type     = \Input::file('photo')->getMimeType();
        $image->filename = $filename;
        $image->saveS3File($filename, $source, $type);
      }
      elseif(\Input::has('delete_photo'))
      {
        $image->filename = '';
        $image->deleteS3File();
      }

      $image->save();

      return \Redirect::route('dashboard.galleries.images.edit', [$gallery_id, $id])->withMessage('Image updated.');
    }
    else
    {
      return \Redirect::route('dashboard.galleries.images.edit', [$gallery_id, $id])
                      ->withErrors($validator)
                      ->withInput();
    }
  }

  public function destroy($gallery_id, $id)
  {
    $gallery = \Gallery::findOrFail($gallery_id);
    $image = $gallery->images()->findOrFail($id);

    $image->deleteS3File();
    $image->delete();

    return \Redirect::route('dashboard.galleries.edit', $gallery_id)->withMessage('Image deleted.');
  }

  public function order($id)
	{
		$gallery = \Gallery::with('images')->findOrFail($id);

		$image_ids = \Input::get('ids');

		foreach($image_ids as $sort_order => $image_id)
		{
			$image = $gallery->images->find($image_id);
			$image->sort_order = $sort_order;
			$image->save();
		}

		return \Response::make(null, 200);
	}

}
