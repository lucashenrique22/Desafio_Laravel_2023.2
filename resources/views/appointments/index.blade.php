@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h1>Agendamento</h1>
@stop

@section('content')

<a href="{{ route('appointments.create') }}" class="btn btn-dark mb-2">Agendar consulta</a>
<div class="card">
        <div class="card-header">
            <div style="align-items: center" class="row">
                <h3 class="card-title">Tabela de Consultas</h3>
            </div>
        </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>Funcionario</th>
                <th>Animal</th>
            </tr>
            </thead>
            <tbody>

                @foreach($appointments as $appointment)
                  <tr>

                    <td> {{ $appointment->user_id}}</td>
                      <td>{{ $appointment->animal_id }}</td>

                      <td>
                         {{-- <span class="d-flex">

                             <a href="{{ route('users.show', $user->id)}}" class="btn btn-primary btn-sm">
                                 <i class="fa-solid fa-user"></i>
                             </a>

                              <form action="{{ route('users.destroy', $user->id) }}" method="post" class="ml-2">
                                  @csrf
                                  @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                              </form>
                         </span> --}}
                      </td>

                  </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://kit.fontawesome.com/31a11ca086.js" crossorigin="anonymous"></script>
@stop
