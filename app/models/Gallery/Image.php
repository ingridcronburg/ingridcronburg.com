<?php namespace Gallery;

use Eloquent;
use AWS;

class Image extends Eloquent {

  // $image->src
  public function getSrcAttribute()
  {
    return "http://ingridcronburg.com.s3.amazonaws.com/{$this->filename}";
  }

  public function saveS3File($filename, $source, $type)
  {
    // safeguard to make sure we
    // have a bucket called ingridcronburg.com
    AWS::get('s3')->createBucket(['Bucket' => 'ingridcronburg.com']);

    return AWS::get('s3')->putObject([
      'Bucket'      => 'ingridcronburg.com',
      'Key'         => $filename,
      'SourceFile'  => $source,
      'ContentType' => $type,
      'ACL'         => 'public-read'
    ]);
  }

  public function deleteS3File()
  {
    // safeguard against accidentally
    // deleting our bucket
    if (empty($this->filename)) return;

    return AWS::get('s3')->deleteObject([
      'Bucket' => 'ingridcronburg.com',
      'Key'    => $this->filename
    ]);
  }

  // relationships

  public function gallery()
  {
    return $this->belongsTo('Gallery');
  }

}
