<?php

namespace Frontend\Controller;

use App\Http\Controllers\Controller;
use Frontend\Model\Contact;
use Illuminate\Support\Facades\Input;

/**
 * Class ContactController
 *
 * @package Frontend\Controller
 * @author Tobias Maxham
 * @generated 22.06.2015
 * @version 22.06.2015
 */
class ContactController extends Controller
{

	public function sendmail()
	{
		$contact = new Contact();
		$contact->name = Input::get('name');
		$contact->email = Input::get('email');
		$contact->phone = Input::get('phone');
		$contact->message = Input::get('messages');
		$contact->topic = Input::get('subject');
		$contact->save();

		\Mail::send('emails.contact', Input::all(), function ($message) {
			$subject = Input::get('subject') == 'NULL' ? 'Anfrage' : ucfirst(Input::get('subject'));
			$message->subject($subject);
			$message->from(Input::get('email'), Input::get('name'));
			$message->to(env('mail.to'));
			$message->cc(env('mail.cc'));
		});

		return \Redirect::to('kontakt');
	}

} 