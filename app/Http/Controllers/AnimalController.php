<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalFormRequest;
use App\Models\Animal;
use App\Models\Owner;
use App\Models\Treatment;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('animals.index')->with('animals', $animals)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        $owners = Owner::all();
        return view('animals.create', compact('owners'));
    }

    public function store(AnimalFormRequest $request)
    {
        $owner = Owner::all();
        $treatments = Treatment::create($request->all());

        $animal = Animal::create(
            [
                'name' => $request->name,
                'birth_date' => $request->birth_date,
                'breed' => $request->breed,
                'treatments' => $treatments->id,
                'owner_id' => $owner->id,
            ]
        );

        return to_route('animals.index')->with('mensagem.sucesso', "Animal '{{ $animal->name }}' cadastrado com sucesso");

    }
}
