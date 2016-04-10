<?php

class Gallery extends Eloquent {

  public function hasCoverImage()
  {
    return ! $this->images->isEmpty();
  }

  public function getCoverImage()
  {
    $image = $this->images->first();

    return $image ? $image->src : '';
  }

  // relationships

  public function images()
  {
    return $this->morphMany('Image', 'imageable');
  }

}
