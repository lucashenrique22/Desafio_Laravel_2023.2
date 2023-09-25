@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <h1>Visualizar Proprietário</h1>

    <div class="form-row">

        <div class="image text-center" >

           <img src=" {{ asset('storage/img/' . $owner->profile_picture ) }}" class="image-thumbnail" height="auto" width="150px" alt="Foto de perfil">
        </div>

        <div class="form-group col-md-6">
            <label for="name">Nome completo</label>
            <input disabled name="name" type="text" class="form-control" id="name"
                   required value="{{ old('name', $owner->name) }}">
        </div>

        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input disabled name="email" type="email" class="form-control" id="email"
                   required value="{{ old('password', $owner->email) }}">
        </div>

        <div class="form-group col-md-6">
            <label for="cpf">Email</label>
            <input disabled name="cpf" type="text" class="form-control" id="cpf"
                   required value="{{ old('cpf', $owner->cpf) }}">
        </div>

    </div>
    <div class="form-group">
        <label for="street">Rua:</label>
        <input disabled name="street" type="text" class="form-control" id="street"
               required value="{{ old('street', $owner->address->street) }}">
    </div>
    <div class="form-group">
        <label for="neighborhood">Bairro:</label>
        <input disabled name="neighborhood" type="text" class="form-control" id="neighborhood"
               required value="{{ old('neighborhood', $owner->address->neighborhood) }}">
    </div>
    <div class="form-group">
        <label for="cep">CEP:</label>
        <input disabled name="cep" type="text" class="form-control" id="cep"
               required value="{{ old('cep', $owner->address->cep) }}">
    </div>
    <div class="form-group">
        <label for="state">Estado:</label>
        <input disabled name="state" type="text" id="state" class="form-control"
               required value="{{ old('state', $owner->address->state) }}">
    </div>
    <div class="form-group">
        <label for="number">Número:</label>
        <input disabled name="number" type="text" class="form-control" id="number"
               required value="{{ old('number', $owner->address->number )}}">
    </div>
    <div class="form-group">
        <label for="birth_date">Data de nascimento</label>
        <input disabled name="birth_date" type="date" class="form-control" id="birth_date"
               required value="{{ old('birth_date', $owner->birth_date) }}">
    </div>
    <div class="form-group">
        <label for="phone_number">Número de telefone</label>
        <input disabled name="phone_number" type="text" class="form-control" id="phone_number"
               required value="{{ old('phone_number', $owner->phone_number) }}" >
    </div>
@stop
