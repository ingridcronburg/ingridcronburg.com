<?php namespace Api;

class ContactController extends \BaseController {

  public function index()
  {
    $name  = \Input::get('name');
    $email = \Input::get('email');
    $text  = \Input::get('text');

    \Mail::send('emails.contact', compact('text'), function($message) use($email, $name)
    {
      $message->to('ingrid@ingridcronburg.com', 'Ingrid Cronburg')
              ->from($email, $name)
              ->subject('Contact Form');
    });

    return json_encode(['success' => true]);
  }
}
