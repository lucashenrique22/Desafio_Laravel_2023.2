<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Animal;
use App\Http\Requests\AppointmentFormRequest;

class AppointmentController extends Controller
{
    //
    public function index()
    {
        $appointments = Appointment::all();
        $mensagemSucesso = session('mensagem.sucesso');


        return view('appointments.index')->with('appointments', $appointments)
            ->with('mensagemSucesso', $mensagemSucesso);
    }


    public function create()
    {
        $users = User::all();
        $animals = Animal::all();

        $appointment = new Appointment();

        return view('appointments.create')->with('users', $users)
        ->with('animals', $animals)->with('appointment', $appointment);
    }


    public function store(AppointmentFormRequest $request)
    {
        $data =$request->all();
        Appointment::create($data);

        return to_route('appointments.index')->with('mensagem.sucesso', "Consulta agendada com sucesso!");
    }
}
