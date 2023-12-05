<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalFormRequest;
use App\Models\Animal;
use App\Models\Appointment;
use App\Models\Owner;
use App\Models\Treatment;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $owners = Owner::all();
        $animals = Animal::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('animals.index')->with('animals', $animals)->with('owners',$owners)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        $owners = Owner::all();
        return view('animals.create', compact('owners'));
    }

    public function store(AnimalFormRequest $request)
    {
        $data = $request->all();
        Animal::create($data);

        return to_route('animals.index')->with('mensagem.sucesso', 'Animal cadastrado com sucesso!');

    }

    public function show(Animal $animal)
    {
        $owners = Owner::all();
        $appointments = Appointment::where('animal_id', $animal->id)->get();
        $appointmentsQty = $appointments->count();

        return view('animals.show', compact('animal', 'appointmentsQty', 'appointments'),
            compact('owners'));
    }

    public function destroy(Animal $animal)
    {
         $animal->delete();
         return to_route('animals.index')->with('mensagem.sucesso', 'Animal removido com sucesso!');
    }

}
