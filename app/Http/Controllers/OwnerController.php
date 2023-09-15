<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OwnerController extends Controller
{
    public function index(Request $request): View
    {
        $owners = Owner::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('owners.index')->with('owners',$owners)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $address = Address::create($request->all());

    }

    public function destroy(Owner $owner)
    {

    }

}
