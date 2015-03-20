<?php

class Image extends Eloquent {

  public function gallery()
  {
    return $this->belongsTo('Gallery');
  }

}
