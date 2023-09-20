@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Controle de animais</h1>
@stop

@section('content')

    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{$mensagemSucesso}}
        </div>
    @endisset

    <a href="{{ route('animals.create') }}" class="btn btn-dark mb-2">Cadastrar animal</a>
        <div class="card">
            <div class="card-header">
                <div style="align-items: center" class="row">
                    <h3 class="card-title">Tabela de animais</h3>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Raça</th>
                        <th>Proprietário</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($animals as $animal)
                        <tr>
                            <td>{{ $animal->name}}</td>
                            <td>{{ $animal->breed}}</td>
                            <td>{{$animal->owner->name}}</td>

                            <td>
                              <span class="d-flex">

                                  <a href="{{ route('animals.show', $animal->id) }}" class="btn btn-primary btn-sm">
                                      <i class="fa-solid fa-user"></i>
                                  </a>
                                <form action="{{ route('animals.destroy', $animal->id) }}" method="post" class="ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                              </span>
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

