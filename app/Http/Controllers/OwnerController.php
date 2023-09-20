<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OwnerFormRequest;
use App\Models\Address;
use App\Models\Owner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OwnerController extends Controller
{
    public function index(): View
    {
        $owners = Owner::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('owners.index')->with('owners',$owners)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('owners.create');
    }

    public function show(Owner $owner): View
    {
        $owner->load('address');
        return view('owners.show', compact('owner'));
    }

    public function store(OwnerFormRequest $request)
    {
        $address = Address::create($request->all());

        $owner = Owner::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'profile_picture' => $request->profile_picture,
                'cpf' => $request->cpf,
                'birth_date' => $request->birth_date,
                'phone_number' => $request->phone_number,
                'address_id' => $address->id,
            ]
        );
        return to_route('owners.index')->with('mensagem.sucesso', "Proprietário '{$owner->name}' cadastrado com sucesso");
    }

    public function destroy(Owner $owner): RedirectResponse
    {
        $owner->delete();

        return to_route('owners.index')->with('mensagem.sucesso', "Proprietário '{$owner->name}' removido com sucesso");
    }

}
