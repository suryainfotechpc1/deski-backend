<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;

class ContactControllerAPI extends Controller
{
	public function getContact(){
		$contacts = Contact::all();
		return $contacts;
	}
	
    public function addContactForm(Request $request){
		
		$contact_form = new ContactForm;
		$contact_form->first_name = $request->first_name;
		$contact_form->last_name = $request->last_name;
		$contact_form->email = $request->email;
		$contact_form->message = $request->message;
		$contact_form->save();

	}
}
