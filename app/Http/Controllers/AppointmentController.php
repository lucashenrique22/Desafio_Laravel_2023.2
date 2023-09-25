<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Animal;
use App\Models\Treatment;
use App\Http\Requests\AppointmentFormRequest;
use App\Http\Controllers\Auth;

class AppointmentController extends Controller
{
    //
    public function index()
    {
        $appointments = Appointment::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('appointments.index')->with('appointments', $appointments)->with('mensagemSucesso', $mensagemSucesso);
    }


    public function create()
    {
        $users = User::all();
        $animals = Animal::all();

        $appointment = new Appointment();

        return view('appointments.create', compact('users', 'animals', 'appointment'));
    }


    public function store(AppointmentFormRequest $request)
    {

        // dd($request->all());
        $treatments = Treatment::create($request->all());

        Appointment::create([
            'start_date' => $request->start_date,
            'end_time' => $request->end_time,
            'cost' => $request->cost,
            'treatment_id' => $treatments->id,
            'user_id' => $request->user_id,
            'animal_id' => $request->animal_id
        ]);

        if($request->start_date >= $request->end_time)
        {
            return back()->with('mensagem.sucesso', 'Horário de início maior ou igual ao de término, digite um horário válido');
        }



        return to_route('appointments.index')->with('mensagem.sucesso', "Consulta agendada com sucesso!");
    }

    public function show(Appointment $appointment)
    {
        $users = User::all();
        $animals = Animal::all();


        return view('appointments.show', compact('users', 'animals', 'appointment'));
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return to_route('appointments.index')->with('mensagem.sucesso', "Consulta removida com sucesso!");
    }

}
