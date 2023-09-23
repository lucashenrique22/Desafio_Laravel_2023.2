<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendEmailOwner;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        $mensagemSucesso = session('mensagem.sucesso');

        return view('email.message')->with('mensagemSucesso', $mensagemSucesso);
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
                Auth::user()->name,
            );
            $time = now()->addSeconds($multiplier * 10);
            Mail::to($owner)->later($time, $email);
        }

   return to_route('/email/index');
    }
}
