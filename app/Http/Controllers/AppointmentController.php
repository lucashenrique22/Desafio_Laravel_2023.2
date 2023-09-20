<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

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


}
