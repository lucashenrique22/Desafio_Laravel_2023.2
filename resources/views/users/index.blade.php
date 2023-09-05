@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Controle de usuários do sistema</h1>
@stop

@section('content')

    <div class="card">
            <div class="card-header">
                <div style="align-items: center" class="row">
                    <h3 class="card-title">Tabela de Usuários</h3>
                    <div style="display: flex; justify-content: flex-end; align-items: center" class="col-sm">
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <form class="d-flex" action="/users/search" method="GET">
                                    <input type="text" name="search" class="form-control float-right" placeholder="Procurar">
                                    <div class="input-group-append">
                                        <button style="margin-left: 10px" type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Data de nascimento</th>

                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                      <tr>
                        <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->birth_date}}</td>
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
@stop
