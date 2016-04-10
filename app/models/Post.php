<?php

class Post extends Eloquent {

  public function getContentAttribute($content)
  {
    $mustache = new Mustache_Engine;
    $compiled = $mustache->render($content, $this->images->toArray());

    return $compiled;
  }

  public function images()
  {
    return $this->morphMany('Image', 'imageable');
  }

  public function tags()
  {
    return $this->belongsToMany('Tag');
  }

}
