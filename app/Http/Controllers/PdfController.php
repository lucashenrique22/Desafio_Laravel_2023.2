<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PdfController extends Controller
{
    //
    public function generate()
    {
        $user = Auth::user()->id;
        $date = now()->format('d/m/y H:i:s');

        $appointments = Appointment::orderBy('start_date', 'desc')->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.pdf', compact('appointments', 'user', 'date'));

        return $pdf->setPaper('a4')->stream('relatorioAnimais');
    }

}
