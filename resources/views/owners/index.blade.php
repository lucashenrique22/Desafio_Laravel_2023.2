@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Controle de proprietários</h1>
@stop

@section('content')

    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{$mensagemSucesso}}
        </div>
    @endisset

    <a href="{{ route('owners.create') }}" class="btn btn-dark mb-2">Cadastrar Proprietário</a>
    <div class="card">
        <div class="card-header">
            <div style="align-items: center" class="row">
                <h3 class="card-title">Tabela de Proprietários</h3>
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
                @foreach($owners as $owner)
                    <tr>
                        <td>{{$owner->name}}</td>
                        <td>{{$owner->email}}</td>
                        <td>{{$owner->birth_date}}</td>

                        <td>
                            <form action="{{ route('users.destroy', $owner->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">X</button>
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
@stop
