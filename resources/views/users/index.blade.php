@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Controle de usuários</h1>
@stop

@section('content')

    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{$mensagemSucesso}}
        </div>
    @endisset

    <a href="{{ route('users.create') }}" class="btn btn-dark mb-2">Cadastrar Usuário</a>
    <div class="card">
            <div class="card-header">
                <div style="align-items: center" class="row">
                    <h3 class="card-title">Tabela de Usuários</h3>
                </div>
            </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Data de nascimento</th>
                    <th>Telefone</th>

                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                      <tr>
                        <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->birth_date}}</td>
                          <td>{{$user->phone_number}}</td>

                          <td>
                              <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                              </form>
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
