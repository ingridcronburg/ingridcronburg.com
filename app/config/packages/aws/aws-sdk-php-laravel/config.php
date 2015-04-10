<?php

return array(

  'key'         => array_get($_ENV, 'aws.key'),
  'secret'      => array_get($_ENV, 'aws.secret'),

  'region'      => 'us-east-1',

  'config_file' => null,

);
