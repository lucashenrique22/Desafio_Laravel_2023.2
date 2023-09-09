
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Formulário de Cadastro</h1>
@stop

@section('content')
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nome completo</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="password">Senha</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Senha">
            </div>
        </div>
        <div class="form-group">
            <label for="birth_date">Data de nascimento</label>
            <input name="birth_date" type="date" class="form-control" id="birth_date">
        </div>
        <div class="form-group">
            <label for="phone_number">Número de telefone</label>
            <input name="phone_number" type="text" class="form-control" id="phone_number" placeholder="(99) 99 0000-0000">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="work_time">Período de trabalho:</label>
                <select name="work_time" id="work_time">
                    <option value="day">Dia</option>
                    <option value="night">Noite</option>
                    <option value="full_time">Integral</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </form>
@stop
