<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendEmailOwner;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        return view('email.message');
    }

    public function send(Request $request)
    {
        $owners = Owner::all();

        foreach ($owners as $index => $owner)
        {
            $multiplier = $index + 1;
            $email = new SendEmailOwner(
                $request->header,
                $request->greetings,
                $request->firstParagraph,
                $request->secondParagraph,
                $request->thanks,
                $request->author,
            );
            $time = now()->addSeconds($multiplier*5);
            Mail::to($owner)->later($time, $email);
        }

        $request->session()->flash('mensagemSucesso', 'Emails enviados com sucesso!');

   return to_route('/emails/index');
    }
}
