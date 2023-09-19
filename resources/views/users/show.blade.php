@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <h1>Visualizar Usuário</h1>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Nome completo</label>
            <input disabled name="name" type="text" class="form-control" id="name" required value="{{ old('name', $user->name) }}">
        </div>
        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input disabled name="email" type="email" class="form-control" id="email" required value="{{ old('email', $user->email) }}" >
        </div>
        <div class="form-group col-md-6">
            <label for="password">Senha</label>
            <input disabled name="password" type="password" class="form-control" id="password" required value="{{ old('password', $user->password) }}">
        </div>
    </div>
    <div class="form-group">
        <label for="street">Rua:</label>
        <input disabled name="street" type="text" class="form-control" id="street">
    </div>
    <div class="form-group">
        <label for="neighborhood">Bairro:</label>
        <input disabled name="neighborhood" type="text" class="form-control" id="neighborhood">
    </div>
    <div class="form-group">
        <label for="cep">CEP:</label>
        <input disabled name="cep" type="text" class="form-control" id="cep">
    </div>
    <div class="form-group">
        <label for="state">Estado:</label>
        <input disabled name="state" type="text" id="state" class="form-control">
    </div>
    <div class="form-group">
        <label for="number">Número:</label>
        <input disabled name="number" type="text" class="form-control" id="number">
    </div>
    <div class="form-group">
        <label for="birth_date">Data de nascimento</label>
        <input disabled name="birth_date" type="date" class="form-control" id="birth_date" required value="{{ old('birth_date', $user->birth_date) }}">
    </div>
    <div class="form-group">
        <label for="phone_number">Número de telefone</label>
        <input disabled name="phone_number" type="text" class="form-control" id="phone_number" required value="{{ old('phone_number', $user->phone_number) }}" >
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="work_time">Período de trabalho:</label>
            <input disabled type="text" class="form-control" id="work_time" required value="{{ old('work_time', $user->work_time) }}">
        </div>
    </div>
@stop
