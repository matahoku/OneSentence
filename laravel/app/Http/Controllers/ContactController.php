<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactSendmail;


class ContactController extends Controller
{
    public function contact(Request $request)
    {
      $to = 'onesentencereview.matamura@gmail.com';
      $input = $request->all();
      Contact::create($request->all());
      Mail::to($to)->send(new ContactSendmail($input));
      return Redirect::route('description',['#contact'])->with('flash_message', 'お問い合わせを受け付けました。');

    }

}
